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
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền hủy đơn hàng này.');
        }
    
        if ($order->status !== 'pending') {
            return redirect()->route('orders.show', $order->id)
                ->with('error', 'Bạn chỉ có thể hủy các đơn hàng đang chờ xác nhận.');
        }
    
        return view('clients.myorder.cancel', compact('order'));
    }
    

    /**
     * Xử lý hủy đơn hàng
     */
    public function cancel(Request $request, Order $order)
    {
        $this->authorize('cancel', $order);
        
        if ($order->status === Order::STATUS_CONFIRMED) { 
            return redirect()->route('orders.index')->with('error', 'Bạn không thể hủy đơn hàng đã được xác nhận.');
        }
    
        $request->validate([
            'cancellation_reason' => 'required|string|max:1000',
        ]);
    
        $oldStatus = $order->status;
    
        $order->status = Order::STATUS_CANCELED; 
        $order->cancellation_reason = $request->cancellation_reason;
        $order->save();
    
        foreach ($order->orderItems as $orderItem) {
            $variant = Variant::find($orderItem->variant_id);
            if ($variant) {
                $variant->quantity += $orderItem->quantity;
                $variant->save();
            }
        }
    
        $order->statusChanges()->create([
            'old_status' => $oldStatus,
            'new_status' => Order::STATUS_CANCELED,
            'notes' => $request->cancellation_reason, 
            'changed_by' => auth()->id(), 
        ]);
    
        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được hủy thành công và tồn kho đã được phục hồi.');
    }
    
    public function confirmReceipt(Order $order)
{
    if ($order->status !== Order::STATUS_DELIVERED) {
        return redirect()->route('orders.index')->with('error', 'Đơn hàng không hợp lệ.');
    }

    $order->updateStatus(Order::STATUS_COMPLETED, 'Khách hàng đã nhận được hàng');

    return redirect()->route('orders.index')->with('success', 'Cảm ơn bạn! Đơn hàng đã được xác nhận là hoàn thành.');
}

}    