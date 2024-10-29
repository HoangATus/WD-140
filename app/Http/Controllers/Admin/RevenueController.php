<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RevenueController extends Controller
{
    public function index(Request $request)
    {
        
        $currentYear = Carbon::now()->year;
        $years = range($currentYear - 5, $currentYear);
    
        // Lấy doanh thu và lợi nhuận theo từng năm
        $revenues = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('variants', 'order_items.variant_id', '=', 'variants.id')
            ->select(
                DB::raw('YEAR(orders.created_at) as year'),
                DB::raw('SUM(order_items.quantity * order_items.price) as revenue'),
                DB::raw('SUM(order_items.quantity * (order_items.price - variants.variant_import_price)) as profit')
            )
            ->whereIn('orders.status', ['delivered', 'completed']) // Lọc trạng thái đơn hàng
            ->whereRaw('YEAR(orders.created_at) >= ?', [$currentYear - 6])
            ->groupBy('year')
            ->orderBy('year', 'ASC')
            ->get();
    
        $revenueData = [];
        foreach ($years as $year) {
            $data = $revenues->firstWhere('year', $year);
            $revenueData[] = [
                'year' => $year,
                'revenue' => $data ? $data->revenue : 0,
                'profit' => $data ? $data->profit : 0,
            ];
        }
    
        // Lấy tháng và năm từ request, mặc định là tháng và năm hiện tại
        $month = $request->input('month', now()->month);
        $year = $request->input('year', now()->year);
    
        // Tất cả các trạng thái có trong model Order
        $statuses = Order::$statuss;
    
        // Chỉ định các trạng thái bạn muốn lấy
        $desiredStatuses = [
            'pending',
            'confirmed',
            'shipped',
            'delivered',
            'completed',
            'failed',
            'canceled',
        ];
    
        // Khởi tạo mảng để lưu số lượng
        $counts = [];
    
        // Đếm số lượng đơn hàng cho mỗi trạng thái trong tháng và năm được chọn
        foreach ($desiredStatuses as $key) {
            $label = $statuses[$key] ?? $key; // Lấy nhãn từ mảng $statuses
            $counts[$label] = Order::where('status', $key)
                // ->whereMonth('created_at', $month)
                // ->whereYear('created_at', $year)
                ->count();
        }
    
        // Tính toán doanh thu và lợi nhuận cho tháng và năm được chọn
        $data = $this->calculateRevenueAndProfit($month, $year); // Đảm bảo hàm này hoạt động đúng

        $topSellingProducts = OrderItem::select('product_id', 'product_name', DB::raw('SUM(quantity) as total_quantity'))
        ->whereHas('order', function ($query) {
            $query->where('status', 'completed'); // Điều kiện trạng thái hoàn thành
        })
        ->groupBy('product_id', 'product_name')
        ->orderByDesc('total_quantity')
        ->limit(5)
        ->get();

    // Top 5 sản phẩm có doanh thu cao nhất
    $topRevenueProducts = OrderItem::select('product_id', 'product_name', DB::raw('SUM(price * quantity) as total_revenue'))
        ->whereHas('order', function ($query) {
            $query->where('status', 'completed'); // Điều kiện trạng thái hoàn thành
        })
        ->groupBy('product_id', 'product_name')
        ->orderByDesc('total_revenue')
        ->limit(5)
        ->get();

    // Top 5 sản phẩm có lợi nhuận cao nhất
    $topProfitProducts = OrderItem::select(
            'order_items.product_id',
            'order_items.product_name',
            DB::raw('SUM((order_items.price - variants.variant_import_price) * order_items.quantity) as total_profit')
        )
        ->join('variants', 'order_items.variant_id', '=', 'variants.id') // Join để lấy giá nhập từ bảng variants
        ->whereHas('order', function ($query) {
            $query->where('status', 'completed'); // Điều kiện trạng thái hoàn thành
        })
        ->groupBy('order_items.product_id', 'order_items.product_name')
        ->orderByDesc('total_profit')
        ->limit(5)
        ->get();

    // Trả về view với dữ liệu
    return view('admins.dashboard', compact('years', 'revenueData', 'counts', 'month', 'year', 'data', 'topSellingProducts', 'topRevenueProducts', 'topProfitProducts'));
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

    if ($month) {
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
        ->groupBy('year')
        ->orderBy('year', 'ASC')
        ->get();

    return response()->json($revenues);
}

// public function index()
// {
//     $currentYear = Carbon::now()->year;
//     $years = range($currentYear - 5, $currentYear);

//     $revenues = DB::table('orders')
//         ->join('order_items', 'orders.id', '=', 'order_items.order_id')
//         ->join('variants', 'order_items.variant_id', '=', 'variants.id')
//         ->select(
//             DB::raw('YEAR(orders.created_at) as year'),
//             DB::raw('SUM(order_items.quantity * order_items.price) as revenue'),
//             DB::raw('SUM(order_items.quantity * (order_items.price - variants.variant_import_price)) as profit')
//         )
//         ->whereRaw('YEAR(orders.created_at) >= ?', [$currentYear - 6])
//         ->groupBy('year')
//         ->orderBy('year', 'ASC')
//         ->get();

//     $revenueData = [];
//     foreach ($years as $year) {
//         $data = $revenues->firstWhere('year', $year);
//         $revenueData[] = [
//             'year' => $year,
//             'revenue' => $data ? $data->revenue : 0,
//             'profit' => $data ? $data->profit : 0,
//         ];
//     }

//     return view('admins.dashboard', compact('years', 'revenueData'));
// }

public function getRevenueByRange(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    if (!$startDate || !$endDate) {
        return response()->json(['error' => 'Missing start_date or end_date'], 400);
    }


    $start = Carbon::parse($startDate);
    $end = Carbon::parse($endDate);
    if ($end->diffInDays($start) > 30) {
        return response()->json(['error' => 'Date range exceeds 30 days'], 400);
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
        ->groupBy('date')
        ->orderBy('date', 'ASC')
        ->get();

    $dateRange = [];
    while ($start <= $end) {
        $data = $revenues->firstWhere('date', $start->toDateString());
        $dateRange[] = [
            'date' => $start->toDateString(),
            'revenue' => $data ? $data->revenue : 0,
            'profit' => $data ? $data->profit : 0,
        ];
        $start->addDay();
    }

    return response()->json($dateRange);
}
}

