<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RevenueController extends Controller
{
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

public function index()
{
    $currentYear = Carbon::now()->year;
    $years = range($currentYear - 5, $currentYear);

    $revenues = DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('variants', 'order_items.variant_id', '=', 'variants.id')
        ->select(
            DB::raw('YEAR(orders.created_at) as year'),
            DB::raw('SUM(order_items.quantity * order_items.price) as revenue'),
            DB::raw('SUM(order_items.quantity * (order_items.price - variants.variant_import_price)) as profit')
        )
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

    return view('admins.dashboard', compact('years', 'revenueData'));
}

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

