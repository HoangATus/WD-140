<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard(Request $request)
    {
        return view('admins.dashboard');
    }

    public function getRevenueData(Request $request)
{
    $startDate = $request->query('start');
    $endDate = $request->query('end');

    // Gọi hàm tính doanh thu
    $revenueData = $this->calculateRevenue($startDate, $endDate);

    // Trả về dữ liệu doanh thu cho client
    return response()->json([
        'sales' => $revenueData['totalRevenue'],
        'cost' => $revenueData['totalCost'],
        'profit' => $revenueData['profit'],
        'dates' => [/* các ngày để hiển thị trong biểu đồ */]
    ]);
}

    public function calculateRevenue($startDate, $endDate)
    {
        $completedOrders = Order::where('status', 'completed')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->with('variants')
            ->get();

        $totalRevenue = 0;
        $totalCost = 0;

        foreach ($completedOrders as $order) {
            foreach ($order->variants as $variant) {
                $revenue = ($variant->variant_sale_price - $variant->variant_import_price) * $variant->quantity;
                $totalRevenue += $revenue;
                $totalCost += $variant->variant_import_price * $variant->quantity;
            }
        }

        return [
            'totalRevenue' => $totalRevenue,
            'totalCost' => $totalCost,
            'profit' => $totalRevenue - $totalCost,
        ];
    }
}
