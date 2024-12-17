<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RevenueController extends Controller
{

    public function index(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
        $monthYear = $request->input('month');


        if ($monthYear) {
            $month = Carbon::parse($monthYear)->month;
            $year = Carbon::parse($monthYear)->year;
        } else {
            $month = now()->month;
            $year = now()->year;
        }

        if (!$month || !$year) {
            $month = now()->format('m');
            $year = now()->format('Y');
        }

        if (!is_numeric($month) || !is_numeric($year)) {
            return back()->withErrors(['month' => 'Tháng hoặc năm không hợp lệ.']);
        }

        $month = (int)$month;
        $year = (int)$year;

        if ($month < 1 || $month > 12 || $year < 1900 || $year > now()->year) {
            return back()->withErrors(['month' => 'Tháng hoặc năm không hợp lệ.']);
        }

        try {
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        } catch (Exception $e) {
            return back()->withErrors(['month' => 'Có lỗi xảy ra khi tính số ngày trong tháng.']);
        }

        $currentYear = Carbon::now()->year;
        $years = range($currentYear - 5, $currentYear);
        $revenu  = DB::table('orders')
            ->selectRaw('YEAR(created_at) as year') 
            ->distinct() 
            ->orderByDesc('year') 
            ->pluck('year'); 

       
        $revenues = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('variants', 'order_items.variant_id', '=', 'variants.id')
            ->select(
                DB::raw('YEAR(orders.created_at) as year'),
                DB::raw('SUM(order_items.quantity * order_items.price) as revenue'),
                DB::raw('SUM(order_items.quantity * (order_items.price - variants.variant_import_price)) as profit')
            )
            ->whereIn('orders.status', ['delivered', 'completed'])
            ->whereYear('orders.created_at', $year)
            ->whereMonth('orders.created_at', $month)
            ->groupBy('year')
            ->orderBy('year', 'ASC')
            ->get();

       
        if ($revenues->isEmpty()) {
            return redirect()->route('admin.dashboard', ['month' => now()->format('Y-m')])
                ->with('message', 'Không có dữ liệu doanh thu cho tháng và năm này. Đã chuyển về tháng hiện tại.');
        }

        $revenueData = [];
        foreach ($years as $year) {
            $data = $revenues->firstWhere('year', $year);
            $revenueData[] = [
                'year' => $year,
                'revenue' => $data ? $data->revenue : 0,
                'profit' => $data ? $data->profit : 0,
            ];
        }

        $statuses = Order::$statuss;
        $desiredStatuses = [
            'pending',
            'confirmed',
            'shipped',
            'delivered',
            'completed',
            'failed',
            'canceled',
        ];

        $counts = [];
        foreach ($desiredStatuses as $key) {
            $label = $statuses[$key] ?? $key;
            $counts[$label] = Order::where('status', $key)
                ->count();
        }

        $data = $this->calculateRevenueAndProfit($month, $year);

           $topSellingProducts = OrderItem::select(
            'order_items.product_id',
            'order_items.product_name',
            'products.product_image_url',
            DB::raw('SUM(order_items.quantity) as total_quantity')
        )
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->whereIn('orders.status', ['delivered', 'completed'])
            ->whereMonth('orders.created_at', $month)
            ->whereYear('orders.created_at', $year)
            ->groupBy('order_items.product_id', 'order_items.product_name', 'products.product_image_url')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();

        if ($topSellingProducts->isEmpty()) {
            return redirect()->route('admin.dashboard', ['month' => now()->format('Y-m')])
                ->with('message', 'Không có dữ liệu sản phẩm bán chạy cho tháng và năm này. Đã chuyển về tháng hiện tại.');
        }

        $topRevenueProducts = OrderItem::select(
            'order_items.product_id',
            'order_items.product_name',
            'products.product_image_url',
            DB::raw('SUM(order_items.price * order_items.quantity) as total_revenue')
        )
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->whereIn('orders.status', ['delivered', 'completed'])
            ->whereMonth('orders.created_at', $month)
            ->whereYear('orders.created_at', $year)
            ->groupBy('order_items.product_id', 'order_items.product_name', 'products.product_image_url')
            ->orderByDesc('total_revenue')
            ->limit(5)
            ->get();

        if ($topRevenueProducts->isEmpty()) {
            return redirect()->route('admin.dashboard', ['month' => now()->format('Y-m')])
                ->with('message', 'Không có dữ liệu sản phẩm doanh thu cao cho tháng và năm này. Đã chuyển về tháng hiện tại.');
        }

        $topProfitProducts = OrderItem::select(
            'order_items.product_id',
            'order_items.product_name',
            'products.product_image_url',
            DB::raw('SUM((order_items.price - variants.variant_import_price) * order_items.quantity) as total_profit')
        )
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('variants', 'order_items.variant_id', '=', 'variants.id')
            ->whereIn('orders.status', ['delivered', 'completed'])
            ->whereMonth('orders.created_at', $month)
            ->whereYear('orders.created_at', $year)
            ->groupBy('order_items.product_id', 'order_items.product_name', 'products.product_image_url')
            ->orderByDesc('total_profit')
            ->limit(5)
            ->get();

        if ($topProfitProducts->isEmpty()) {
            return redirect()->route('admin.dashboard', ['month' => now()->format('Y-m')])
                ->with('message', 'Không có dữ liệu sản phẩm lợi nhuận cao cho tháng và năm này. Đã chuyển về tháng hiện tại.');
        }

        return view('admins.dashboard', compact('month', 'revenu', 'year', 'topSellingProducts', 'topRevenueProducts', 'topProfitProducts', 'daysInMonth', 'counts', 'currentYear'));
    }





    protected function calculateRevenueAndProfit($month, $year)
    {
        // Khởi tạo dữ liệu
        $dates = [];
        $revenue = [];
        $profit = [];
        $totalRevenue = 0; // Biến để lưu tổng doanh thu
        $totalOrders = 0;   // Biến để lưu tổng số đơn hàng

        // Lấy số ngày trong tháng
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year); // Số ngày trong tháng

        // Tạo danh sách ngày trong tháng
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $dates[] = $day;

            // Lấy tổng doanh thu và lợi nhuận từ cơ sở dữ liệu cho từng ngày chỉ với trạng thái đã hoàn thành và giao hàng thành công
            $dailyData = Order::whereDay('created_at', $day)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->whereIn('status', ['delivered', 'confirmed']) // Chỉ lấy đơn hàng đã hoàn thành và giao hàng thành công
                ->with(['items.variant'])
                ->get();

            $dailyRevenue = 0;
            $dailyProfit = 0;

            // Duyệt qua các đơn hàng trong ngày
            foreach ($dailyData as $order) {
                $totalOrders++; // Cộng dồn số đơn hàng
                foreach ($order->items as $item) {
                    $dailyRevenue += $item->price * $item->quantity;
                    if ($item->variant) {
                        $dailyProfit += ($item->price - $item->variant->variant_import_price) * $item->quantity;
                    }
                }
            }

            // Cộng dồn tổng doanh thu
            $totalRevenue += $dailyRevenue;

            // Lưu doanh thu và lợi nhuận vào mảng
            $revenue[] = $dailyRevenue;
            $profit[] = $dailyProfit;
        }

        // Lấy tên các ngày trong tuần (Lịch Việt)
        $weekDays = ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'];
        $weekDates = [];

        // Tạo danh sách ngày trong tuần với tên ngày
        for ($date = 1; $date <= $daysInMonth; $date++) {
            $weekDates[] = [
                'date' => $date,
                'dayName' => $weekDays[(new Carbon($year . '-' . $month . '-' . $date))->dayOfWeek],
            ];
        }

        // Trả về dữ liệu để sử dụng trong view
        return [
            'dates' => $dates,
            'revenue' => $revenue,
            'profit' => $profit,
            'totalRevenue' => $totalRevenue, // Trả về tổng doanh thu
            'totalOrders' => $totalOrders,     // Trả về tổng số đơn hàng
            'weekDates' => $weekDates,
        ];
    }




    public function getRevenueInRange(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        Log::info("Start Date: $startDate, End Date: $endDate");

        $revenues = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('variants', 'order_items.variant_id', '=', 'variants.id')
            ->select(
                DB::raw('DATE(orders.created_at) as date'),
                DB::raw('SUM(order_items.quantity * order_items.price) as revenue'),
                DB::raw('SUM(order_items.quantity * (order_items.price - variants.variant_import_price)) as profit')
            )
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        Log::info("Revenues: ", $revenues->toArray());

        $dateRange = [];
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        $dateDiff = $end->diffInDays($start);

        for ($i = 0; $i <= $dateDiff; $i++) {
            $currentDate = $start->copy()->addDays($i);
            $revenueData = $revenues->firstWhere('date', $currentDate->toDateString());
            $dateRange[] = [
                'date' => $currentDate->toDateString(),
                'revenue' => $revenueData ? $revenueData->revenue : 0,
                'profit' => $revenueData ? $revenueData->profit : 0
            ];
        }

        return response()->json($dateRange);
    }


    public function getRevenue(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');
        $day = $request->input('day');
        $whereInStatus = ['delivered', 'completed'];
        if ($day) {
            $revenues = DB::table('orders')
                ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                ->join('variants', 'order_items.variant_id', '=', 'variants.id')
                ->select(
                    DB::raw('HOUR(orders.created_at) as hour'),
                    DB::raw('SUM(order_items.quantity * order_items.price) as revenue'),
                    DB::raw('SUM(order_items.quantity * (order_items.price - variants.variant_import_price)) as profit')
                )
                ->whereDate('orders.created_at', $day)
                ->whereIn('orders.status', $whereInStatus)

                ->groupBy('hour')
                ->orderBy('hour', 'ASC')
                ->get();

            $formattedData = $this->formatHourlyData($revenues);
            return response()->json($formattedData);
        }

        if ($month & $year) {
            $revenues = DB::table('orders')
                ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                ->join('variants', 'order_items.variant_id', '=', 'variants.id')
                ->select(
                    DB::raw('DAY(orders.created_at) as day'),
                    DB::raw('SUM(order_items.quantity * order_items.price) as revenue'),
                    DB::raw('SUM(order_items.quantity * (order_items.price - variants.variant_import_price)) as profit')
                )
                ->whereYear('orders.created_at', $year)
                ->whereMonth('orders.created_at', $month)
                ->whereIn('orders.status', $whereInStatus)
                ->groupBy('day')
                ->orderBy('day', 'ASC')
                ->get();

            $formattedData = $this->formatDailyData($revenues, $year, $month);
            return response()->json($formattedData);
        }

        if ($year) {
            $revenues = DB::table('orders')
                ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                ->join('variants', 'order_items.variant_id', '=', 'variants.id')
                ->select(
                    DB::raw('MONTH(orders.created_at) as month'),
                    DB::raw('SUM(order_items.quantity * order_items.price) as revenue'),
                    DB::raw('SUM(order_items.quantity * (order_items.price - variants.variant_import_price)) as profit')
                )
                ->whereYear('orders.created_at', $year)
                ->whereIn('orders.status', $whereInStatus)
                ->groupBy('month')
                ->orderBy('month', 'ASC')
                ->get();

            $formattedData = $this->formatMonthlyData($revenues);
            return response()->json($formattedData);
        }

        return response()->json([]);
    }

    private function formatHourlyData($revenues)
    {
        $hours = range(0, 23);
        $formattedData = [];
        foreach ($hours as $hour) {
            $data = $revenues->firstWhere('hour', $hour);
            $formattedData[] = [
                'hour' => $hour,
                'revenue' => $data ? $data->revenue : 0,
                'profit' => $data ? $data->profit : 0,
            ];
        }
        return $formattedData;
    }

    private function formatDailyData($revenues, $year, $month)
    {
        $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;
        $formattedData = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $data = $revenues->firstWhere('day', $day);
            $formattedData[] = [
                'day' => $day,
                'revenue' => $data ? $data->revenue : 0,
                'profit' => $data ? $data->profit : 0,
            ];
        }
        return $formattedData;
    }

    private function formatMonthlyData($revenues)
    {
        $formattedData = [];
        for ($month = 1; $month <= 12; $month++) {
            $data = $revenues->firstWhere('month', $month);
            $formattedData[] = [
                'month' => $month,
                'revenue' => $data ? $data->revenue : 0,
                'profit' => $data ? $data->profit : 0,
            ];
        }
        return $formattedData;
    }


    public function getRevenueByYear()
    {
        $revenues = DB::table('order_items')
            ->selectRaw('YEAR(created_at) as year, SUM(price * quantity) as revenue')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereIn('orders.status', ['delivered', 'completed'])
            ->groupBy('year')
            ->orderBy('year', 'ASC')
            ->get();

        return response()->json($revenues);
    }
    public function getRevenueByRange(Request $request)
    {
        $dateRange = $request->input('daterange');
        if (!$dateRange) {
            return response()->json(['error' => 'Vui lòng nhập khoảng thời gian.'], 400);
        }

        list($startDate, $endDate) = explode(' - ', $dateRange);
        $startDate = Carbon::parse($startDate)->startOfDay();
        $endDate = Carbon::parse($endDate)->endOfDay();
        $today = Carbon::today()->endOfDay();

        if ($startDate->greaterThan($endDate)) {
            return response()->json(['error' => 'Ngày bắt đầu không được lớn hơn ngày kết thúc.'], 400);
        }

        if ($endDate->greaterThan($today)) {
            return response()->json(['error' => 'Ngày kết thúc không được vượt quá ngày hiện tại.'], 400);
        }

        if ($endDate->diffInDays($startDate) > 30) {
            return response()->json(['error' => 'Khoảng thời gian không được quá 30 ngày.'], 400);
        }

        $revenues = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('variants', 'order_items.variant_id', '=', 'variants.id')
            ->select(
                DB::raw('DATE(orders.created_at) as date'),
                DB::raw('SUM(order_items.quantity * order_items.price) as revenue'),
                DB::raw('SUM(order_items.quantity * (order_items.price - variants.variant_import_price)) as profit')
            )
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->whereIn('orders.status', ['delivered', 'completed'])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $dateRangeResponse = [];
        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            $data = $revenues->firstWhere('date', $currentDate->toDateString());
            $dateRangeResponse[] = [
                'date' => $currentDate->toDateString(),
                'revenue' => $data ? $data->revenue : 0,
                'profit' => $data ? $data->profit : 0,
            ];
            $currentDate->addDay();
        }

        return response()->json($dateRangeResponse);
    }
    public function getRevenueByMonth(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        $revenues = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('variants', 'order_items.variant_id', '=', 'variants.id')
            ->select(
                DB::raw('DAY(orders.created_at) as day'),
                DB::raw('SUM(order_items.quantity * order_items.price) as revenue'),
                DB::raw('SUM(order_items.quantity * (order_items.price - variants.variant_import_price)) as profit')
            )
            ->whereYear('orders.created_at', $year)
            ->whereMonth('orders.created_at', $month)
            ->whereIn('orders.status', ['delivered', 'completed'])
            ->groupBy('day')
            ->orderBy('day', 'ASC')
            ->get();

        $formattedData = $this->formatDailyData($revenues, $year, $month);

        return response()->json($formattedData);
    }
}
