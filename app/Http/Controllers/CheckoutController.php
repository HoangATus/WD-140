<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Http\Requests\StoreCheckoutRequest;
use App\Http\Requests\UpdateCheckoutRequest;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{

    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('clients.checkout.index', compact('cart', 'total'));
    }

    /**
     * Xử lý đơn hàng
     */
    public function process(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'notes'   => 'nullable|string|max:1000',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Tính tổng tiền
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $params['order_code'] = $this->generateUniqueOrderCode();

        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_code' => $params['order_code'],
            'name'    => $request->name,
            'phone'   => $request->phone,
            'address' => $request->address,
            'notes'   => $request->notes,
            'total'   => $total,
            'status'  => 'pending',
            'payment_method' => $request->payment_method,
        ]);

        // Tạo các mục đơn hàng
        foreach ($cart as $variant_id => $item) {
            $variant = Variant::find($variant_id);

            // Kiểm tra tồn kho
            if ($variant->quantity < $item['quantity']) {
                // Xử lý khi tồn kho không đủ
                return redirect()->route('cart.index')->with('error', 'Số lượng sản phẩm ' . $item['product_name'] . ' không đủ.');
            }

            // Giảm tồn kho
            $variant->quantity -= $item['quantity'];
            $variant->save();

            // Tạo mục đơn hàng
            OrderItem::create([
                'order_id'    => $order->id,
                'variant_id'  => $variant_id,
                'product_id'  => $item['product_id'],
                'product_name'=> $item['product_name'],
                'variant_name'=> $item['variant_name'],
                'price'       => $item['price'],
                'quantity'    => $item['quantity'],
                'image'       => $item['image'],
            ]);
        }

        // Xóa giỏ hàng sau khi đặt hàng thành công
        session()->forget('cart');

        return redirect()->route('checkout')->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
    }

    function generateUniqueOrderCode()
    {
        do {
            $orderCode = 'ORD-' . Auth::id() . '-' . now()->timestamp;
        } while (Order::where('order_code', $orderCode)->exists());

        return $orderCode;
    }

   
}
