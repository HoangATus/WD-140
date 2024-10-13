<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItems', 'user')->get();
        return view('admins.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('orderItems.product', 'orderItems.variant', 'statusChanges.user')->findOrFail($id);
        return view('admins.orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,confirmed,shipped,completed,canceled,failed',
            'notes' => in_array($request->status, ['canceled', 'failed']) ? 'required|string' : 'nullable|string',
        ], [
            'notes.required' => 'Bạn phải nhập ghi chú khi hủy đơn hàng hoặc giao hàng thất bại.',
        ]);

        if (!$request->notes) {
            switch ($request->status) {
                case 'confirmed':
                    $request->merge(['notes' => 'Đơn hàng đã được xác nhận.']);
                    break;
                case 'shipped':
                    $request->merge(['notes' => 'Đơn hàng đang được giao.']);
                    break;
                case 'completed':
                    $request->merge(['notes' => 'Đơn hàng đã hoàn thành.']);
                    break;
                case 'canceled':
                    $request->merge(['notes' => 'Đơn hàng đã bị hủy.']);
                    break;
                case 'failed':
                    $request->merge(['notes' => 'Giao hàng thất bại.']);
                    break;
                default:
                    $request->merge(['notes' => 'Trạng thái đơn hàng đã thay đổi.']);
                    break;
            }
        }

        if ($order->status == 'pending' && in_array($request->status, ['confirmed', 'canceled'])) {
            $order->updateStatus($request->status, $request->notes, Auth::user()->id);
        } elseif ($order->status == 'confirmed' && $request->status == 'shipped') {
            $order->updateStatus($request->status, $request->notes, Auth::user()->id);
        } elseif ($order->status == 'shipped' && in_array($request->status, ['completed', 'failed'])) {
            $order->updateStatus($request->status, $request->notes, Auth::user()->id);
        } elseif ($order->status == 'completed') {
            return back()->withErrors(['status' => 'Không thể thay đổi trạng thái đơn hàng đã hoàn thành.']);
        } elseif (in_array($order->status, ['canceled', 'failed'])) {
            return back()->withErrors(['status' => 'Không thể thay đổi trạng thái đơn hàng đã hủy hoặc giao hàng thất bại.']);
        } else {
            return back()->withErrors(['status' => 'Vui Lòng Chọn Trạng thái  hợp lệ.']);
        }
        return redirect()->route('admins.orders.show', $order->id)
            ->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
    }
}
