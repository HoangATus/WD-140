<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Tất cả các trạng thái có trong model Order
    $statuses = Order::$statuss;

    // Chỉ định các trạng thái bạn muốn lấy
    $desiredStatuses = [
        'pending',       // Chờ Xác Nhận
        'confirmed',     // Đã Xác Nhận
        'shipped',       // Đang Giao Hàng
        'delivered',     // Giao Hàng Thành Công
        'failed',        // Giao thất bại
        'canceled',       // Đã Hủy
    ];

    // Khởi tạo mảng để lưu số lượng
    $counts = [];
    
    // Lặp qua từng trạng thái mong muốn và đếm số lượng đơn hàng cho mỗi trạng thái
    foreach ($desiredStatuses as $key) {
        $label = $statuses[$key] ?? $key; // Lấy nhãn từ mảng $statuses
        $counts[$label] = Order::where('status', $key)->count();
    }

    // Trả về view với dữ liệu số lượng đơn hàng
    return view('admins.dashboard', ['orderCounts' => $counts]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
