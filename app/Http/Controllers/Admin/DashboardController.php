<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DashBoardController extends Controller
{

    public function index(Request $request)
    {
        $month = $request->input('month', now()->month);
        $year = $request->input('year', now()->year);

        $statuses = Order::$statuss;

        $desiredStatuses = [
            'pending',
            'confirmed',
            'shipped',
            'delivered',
            'failed',

            'canceled',
        ];

        $counts = [];

        foreach ($desiredStatuses as $key) {
            $label = $statuses[$key] ?? $key;
            $counts[$label] = Order::where('status', $key)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->count();
        }

        $data = $this->calculateRevenueAndProfit($month, $year);

        return view('admins.dashboard', [
            'orderCounts' => $counts,
            'month' => $month,
            'year' => $year,
            'data' => $data,
        ]);
    }

    protected function calculateRevenueAndProfit($month, $year)
    {
        $dates = [];
        $revenue = [];
        $profit = [];
        $totalRevenue = 0;
        $totalOrders = 0;

        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $dates[] = $day;

            $dailyData = Order::whereDay('created_at', $day)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->whereIn('status', ['delivered', 'confirmed'])
                ->with(['items.variant'])
                ->get();

            $dailyRevenue = 0;
            $dailyProfit = 0;

            foreach ($dailyData as $order) {
                $totalOrders++;
                foreach ($order->items as $item) {
                    $dailyRevenue += $item->price * $item->quantity;
                    if ($item->variant) {
                        $dailyProfit += ($item->price - $item->variant->variant_import_price) * $item->quantity;
                    }
                }
            }

            $totalRevenue += $dailyRevenue;

            $revenue[] = $dailyRevenue;
            $profit[] = $dailyProfit;
        }

        $weekDays = ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'];
        $weekDates = [];

        for ($date = 1; $date <= $daysInMonth; $date++) {
            $weekDates[] = [
                'date' => $date,
                'dayName' => $weekDays[(new Carbon($year . '-' . $month . '-' . $date))->dayOfWeek],
            ];
        }

        return [
            'dates' => $dates,
            'revenue' => $revenue,
            'profit' => $profit,
            'totalRevenue' => $totalRevenue,
            'totalOrders' => $totalOrders,
            'weekDates' => $weekDates,
        ];
    }
}
