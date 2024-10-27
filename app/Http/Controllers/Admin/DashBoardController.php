<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // Lấy tháng và năm từ request, mặc định là tháng và năm hiện tại
        $month = $request->input('month', now()->month);
        $year = $request->input('year', now()->year); // Thêm lấy năm từ request

        // Tất cả các trạng thái có trong model Order
        $statuses = Order::$statuss;


        // Chỉ định các trạng thái bạn muốn lấy
        $desiredStatuses = [
            'pending',       // Chờ Xác Nhận
            'confirmed',     // Đã Xác Nhận
            'shipped',       // Đang Giao Hàng
            'delivered',     // Giao Hàng Thành Công
            'failed',        // Giao thất bại

            'canceled',      // Đã Hủy
        ];

        // Khởi tạo mảng để lưu số lượng
        $counts = [];

        // Lặp qua từng trạng thái mong muốn và đếm số lượng đơn hàng cho mỗi trạng thái trong tháng và năm được chọn
        foreach ($desiredStatuses as $key) {
            $label = $statuses[$key] ?? $key; // Lấy nhãn từ mảng $statuses
            $counts[$label] = Order::where('status', $key)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year) // Thêm điều kiện năm
                ->count();
        }

        // Tính toán doanh thu và lợi nhuận cho tháng và năm được chọn
        $data = $this->calculateRevenueAndProfit($month, $year); // Cập nhật để truyền năm

        // Trả về view với dữ liệu số lượng đơn hàng và biểu đồ
        return view('admins.dashboard', [
            'orderCounts' => $counts,
            'month' => $month,
            'year' => $year, // Truyền năm vào view
            'data' => $data,
        ]);
    }



    /**
     * Phương thức tính doanh thu và lợi nhuận cho tháng được chọn.
     */
    protected function calculateRevenueAndProfit($month)
    {
        // Khởi tạo dữ liệu
        $dates = [];
        $revenue = [];
        $profit = [];
        $totalRevenue = 0; // Biến để lưu tổng doanh thu
        $totalOrders = 0;   // Biến để lưu tổng số đơn hàng

        // Lấy số ngày trong tháng
        $year = now()->year;
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year); // Số ngày trong tháng

        // Tạo danh sách ngày trong tháng
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $dates[] = $day;

            // Lấy tổng doanh thu và lợi nhuận từ cơ sở dữ liệu cho từng ngày
            $dailyData = Order::whereDay('created_at', $day)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
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

        // Lấy ngày đầu tháng và cuối tháng
        $firstDayOfMonth = Carbon::createFromDate($year, $month, 1);
        $lastDayOfMonth = Carbon::createFromDate($year, $month, $daysInMonth);

        // Tạo danh sách ngày trong tuần với tên ngày
        for ($date = $firstDayOfMonth; $date->lte($lastDayOfMonth); $date->addDay()) {
            $weekDates[] = [
                'date' => $date->day,
                'dayName' => $weekDays[$date->dayOfWeek], // Tên ngày
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
}
