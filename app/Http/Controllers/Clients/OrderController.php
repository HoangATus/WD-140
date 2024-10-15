<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem đơn hàng.');
        }
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);

        return view('clients.orders.index', compact('orders', 'cart', 'total'));
    }

    /**
     * Hiển thị chi tiết đơn hàng
     */
    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);

        // Kiểm tra xem người dùng có quyền xem đơn hàng này không
        if (Auth::check()) {
            if ($order->user_id !== Auth::id()) {
                abort(403, 'Bạn không có quyền xem đơn hàng này.');
            }
        } else {
            // Nếu không đăng nhập, có thể thêm logic để kiểm tra theo mã đơn hàng hoặc email người dùng
            abort(403, 'Bạn cần đăng nhập để xem đơn hàng.');
        }

        return view('clients.orders.show', compact('order'));
    }



    /**
     * Hiển thị form hủy đơn hàng
     */
    public function showCancelForm(Order $order)
    {
        if ($order->user_id !== Auth::user()->user_id) {
            abort(403, 'Bạn không có quyền hủy đơn hàng này.');
        }

        // Kiểm tra trạng thái đơn hàng có thể hủy không
        if (!in_array($order->status, ['pending', 'confirmed'])) {
            return redirect()->route('orders.index')->with('error', 'Bạn chỉ có thể hủy các đơn hàng đang chờ xử lý hoặc đã xác nhận.');
        }

        return view('clients.myorder.cancel', compact('order'));
    }

    /**
     * Xử lý hủy đơn hàng
     */
    public function cancel(Request $request, Order $order)
    {
        $this->authorize('cancel', $order);

        // Xác thực dữ liệu đầu vào, bao gồm lý do hủy
        $request->validate([
            'cancellation_reason' => 'required|string|max:1000',
        ]);

        // Cập nhật trạng thái đơn hàng thành 'canceled' và lưu lý do hủy
        $order->status = 'canceled';
        $order->cancellation_reason = $request->cancellation_reason;
        $order->save();

        // Phục hồi tồn kho
        foreach ($order->orderItems as $orderItem) {
            $variant = Variant::find($orderItem->variant_id);
            if ($variant) {
                $variant->quantity += $orderItem->quantity;
                $variant->save();
            }
        }

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được hủy thành công và tồn kho đã được phục hồi.');
    }
}