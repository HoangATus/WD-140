<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Variant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyOrderController extends Controller
{


    public function index()
    {
        $user = Auth::user();


        // Lấy các đơn hàng của người dùng, sắp xếp theo ngày tạo mới nhất

        $orders = $user->orders()->orderBy('created_at', 'desc')->paginate(10);

        foreach ($orders as $order) {
            if (
                $order->payment_method === 'online'
                && $order->payment_status === 'pending'
                && $order->created_at <= Carbon::now()->subHours(24)
            ) {
                $order->payment_status = 'failed';
                $order->status = 'canceled';
                $order->cancellation_reason = 'Đơn hàng bị hủy do hệ thống sau 24 giờ không thanh toán';
                $order->save();
            }
        }

        return view('clients.myorder.index', compact('orders'));
    }




    /**
     * Hiển thị chi tiết một đơn hàng cụ thể của người dùng
     */



    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền truy cập đơn hàng này.');
        }

        $orderItems = $order->orderItems;
        $groupedItems = $orderItems->groupBy('product_id');
        if (
            $order->payment_method === 'online'
            && $order->payment_status === 'pending'
            && $order->created_at <= Carbon::now()->subHours(24)
        ) {
            $order->payment_status = 'failed';
            $order->status = 'canceled';
            $order->cancellation_reason = 'Đơn hàng bị hủy do hệ thống sau 24 giờ không thanh toán';
            $order->save();
        }
        return view('clients.myorder.show', compact('order', 'orderItems', 'groupedItems'));
    }

    public function cancel($id)
    {
        $user = Auth::user();

        $order = $user->orders()->find($id);
        if ($order->user_id !== Auth::user()->user_id) {
            abort(403, 'Bạn không có quyền truy cập đơn hàng này.');
        }

        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Đơn hàng không tồn tại.');
        }
        if ($order->status === 'cancelled') {
            return redirect()->route('orders.index')->with('error', 'Đơn hàng đã được hủy.');
        }
        $order->status = 'cancelled';
        $order->save();
        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được hủy.');
    }
}
