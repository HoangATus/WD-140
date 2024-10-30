<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    /**
     * Hiển thị danh sách các đơn hàng của người dùng hiện tại
     */
    public function index()
    {
        // Lấy người dùng hiện tại
        $user = Auth::user();

        // Lấy các đơn hàng của người dùng, sắp xếp theo ngày tạo mới nhất
        $orders = $user->orders()->orderBy('created_at', 'desc')->paginate(10);

        return view('clients.myorder.index', compact('orders'));
    }


    /**
     * Hiển thị chi tiết một đơn hàng cụ thể của người dùng
     */
    public function show(Order $order)
    {
        // Kiểm tra xem đơn hàng có thuộc về người dùng hiện tại không
        if ($order->user_id !== Auth::user()->user_id) {
            abort(403, 'Bạn không có quyền truy cập đơn hàng này.');
        }

        // Lấy các mục đơn hàng
        $orderItems = $order->orderItems;

        $groupedItems = $order->items->groupBy('product_id');


        return view('clients.myorder.show', compact('order', 'orderItems', 'groupedItems'));
    }

    public function cancel($id)
    {
        // Lấy người dùng hiện tại
        $user = Auth::user();

        // Lấy đơn hàng theo ID và kiểm tra quyền sở hữu
        $order = $user->orders()->find($id);
        // dd($order);
        if ($order->user_id !== Auth::user()->user_id) {
            abort(403, 'Bạn không có quyền truy cập đơn hàng này.');
        }

        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Đơn hàng không tồn tại.');
        }

        // Kiểm tra trạng thái đơn hàng trước khi hủy
        if ($order->status === 'cancelled') {
            return redirect()->route('orders.index')->with('error', 'Đơn hàng đã được hủy.');
        }

        // Cập nhật trạng thái đơn hàng thành 'cancelled'
        $order->status = 'cancelled';
        $order->save();

        // dd($order)->all();
        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được hủy.');
    }
}