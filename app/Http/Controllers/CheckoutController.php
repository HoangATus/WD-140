<?php

namespace App\Http\Controllers;

use App\Mail\OrderSuccessful;
use App\Models\Order;
use App\Models\Variant;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CheckoutController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user = Auth::user();

        $cart = session()->get('cart_' . $userId, []);
        $total = session()->get('cart_total', 0);
        $sum = session()->get('cart_sum', 0);
        $appliedPoints = session()->get('applied_loyalty_points', 0);
        $discountAmount = session()->get('discount_amount', 0);

        return view('clients.checkout.index', compact('user', 'cart', 'total', 'sum', 'appliedPoints', 'discountAmount'));
    }

    public function process(Request $request)
    {
        if ($request->has('cancel_order')) {
            return $this->cancelOrder($request->input('order_id'));
        }

        $request->validate([
            'name'            => 'required|string|max:255',
            'phone'           => 'required|string|max:20',
            'address'         => 'required|string|max:500',
            'notes'           => 'nullable|string|max:1000',
            'payment_method'  => 'required|in:cod,online',  // Chỉ chấp nhận COD hoặc online
        ]);

        $userId = Auth::id();
        $user = Auth::user();
        $cart = session()->get('cart_' . $userId, []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $total = session()->get('cart_total', 0);
        $usedPoints = session()->get('applied_loyalty_points', 0);

        $params['order_code'] = $this->generateUniqueOrderCode();
        $order = Order::create([
            'user_id'        => $userId,
            'order_code'     => $params['order_code'],
            'name'           => $request->name,
            'phone'          => $request->phone,
            'address'        => $request->address,
            'notes'          => $request->notes,
            'total'          => $total,
            'status'         => 'pending',
            'payment_method' => $request->payment_method,
        ]);

        foreach ($cart as $variant_id => $item) {
            $variant = Variant::find($variant_id);

            if ($variant->quantity < $item['quantity']) {
                return redirect()->route('cart.index')->with('error', 'Số lượng sản phẩm ' . $item['product_name'] . ' không đủ.');
            }

            $variant->quantity -= $item['quantity'];
            $variant->save();

            OrderItem::create([
                'order_id'     => $order->id,
                'variant_id'   => $variant_id,
                'product_id'   => $item['product_id'],
                'product_name' => $item['product_name'],
                'variant_name' => $item['variant_name'],
                'price'        => $item['price'],
                'quantity'     => $item['quantity'],
                'image'        => $item['image'],
            ]);
        }

<<<<<<< HEAD
        session()->forget('cart_' . $userId);
=======
        if ($usedPoints > 0) {
            $user->points -= $usedPoints;
            $user->save();
        }

        session()->forget('cart_' . $userId);
        session()->forget('cart_total');
        session()->forget('applied_loyalty_points');
>>>>>>> 47fc089084944f8ecdbdd8530ba8ba7603d4945b

        if ($request->payment_method == 'online') {
            return $this->createVNPayPaymentLink($order);
        }

        Mail::to($user->user_email)->send(new OrderSuccessful($order));

        return redirect()->route('checkout.success', ['order' => $order->id]);
    }


    public function success()
    {
        return view('clients.checkout.orderSuccess');
    }

    /**
     * Tạo link thanh toán VNPay
     */
    public function createVNPayPaymentLink($order)
    {
        $vnp_TmnCode = env('VNP_TMN_CODE'); // Mã website do VNPay cấp
        $vnp_HashSecret = env('VNP_HASH_SECRET'); // Chuỗi bí mật
        $vnp_Url = env('VNP_URL');
        $vnp_ReturnUrl = env('VNP_RETURN_URL');

        $vnp_TxnRef = $order->order_code; // Mã đơn hàng
        $vnp_OrderInfo = "Thanh toán đơn hàng " . $order->order_code;
        $vnp_Amount = $order->total * 100; // Số tiền VNPay yêu cầu nhân 100 (VND)
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => 'billpayment',
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); // Tạo chuỗi hash
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect()->away($vnp_Url); // Chuyển hướng người dùng đến link thanh toán VNPay
    }

    function generateUniqueOrderCode()
    {
        do {
            $orderCode = 'ATUS' . Auth::id() . now()->timestamp . random_int(1000, 9999);
        } while (Order::where('order_code', $orderCode)->exists());

        return $orderCode;
    }  
    public function checkout2(Request $request)
    {
        $variantId = $request->input('variant_id');
        $quantity = $request->input('quantity');
    
        if (!$variantId || !$quantity || $quantity < 1) {
            return redirect()->route('home')->with('error', 'Thông tin không hợp lệ.');
        }
    
        $variant = Variant::find($variantId);
        if (!$variant || $variant->quantity < $quantity) {
            return redirect()->route('home')->with('error', 'Sản phẩm không đủ số lượng.');
        }
    
        $userId = Auth::id();
        $user = User::find($userId);
        $total = $variant->variant_sale_price * $quantity;
    
        $pointsToMoneyRate = 1; 
        $discount = min($user->points * $pointsToMoneyRate, $total); 
        $finalTotal = $total - $discount;
    
        return view('clients.checkout.checkout2', compact('variant', 'user', 'quantity', 'total', 'discount', 'finalTotal'));
    }
    
    public function process2(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'notes' => 'nullable|string|max:1000',
            'payment_method' => 'required|in:cod,online',
            'variant_id' => 'required|exists:variants,id',
            'quantity' => 'required|integer|min:1',
            'points' => 'nullable|integer|min:0|max:' . Auth::user()->points,
        ]);
    
        $userId = Auth::id();
        $user = User::find($userId);
        $variant = Variant::with(['color', 'size'])->find($request->variant_id);
    
        if ($variant->quantity < $request->quantity) {
            return redirect()->route('checkout.checkout2')->with('error', 'Số lượng sản phẩm không đủ.');
        }
    
        $subtotal = $variant->variant_sale_price * $request->quantity;
        $pointsToMoneyRate = 1;
        $discount = 0;
    
        if ($request->points && $request->points > 0) {
            $discount = min($request->points * $pointsToMoneyRate, $subtotal);
            $subtotal -= $discount; 
            $user->points -= $request->points; 
            $user->save();
        }
    
        $order = Order::create([
            'user_id' => $userId,
            'order_code' => $this->generateUniqueOrderCode(),
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'notes' => $request->notes,
            'total' => max($subtotal, 0), 
            'discount' => $discount,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
        ]);
    
      
        $variant->quantity -= $request->quantity;
        $variant->save();
    

        $attribute_color_name = $variant->color ? $variant->color->name : 'Unknown Color';
        $attribute_size_name = $variant->size ? $variant->size->attribute_size_name : 'Unknown Size';
    
        OrderItem::create([
            'order_id' => $order->id,
            'variant_id' => $variant->id,
            'product_id' => $variant->product_id,
            'product_name' => $variant->product->product_name,
            'variant_name' => $attribute_color_name . '-' . $attribute_size_name,
            'price' => $variant->variant_sale_price,
            'quantity' => $request->quantity,
            'image' => Storage::url($variant->image),
        ]);
    
        if ($request->payment_method == 'online') {
            return $this->createVNPayPaymentLink($order);
        }

        Mail::to(Auth::user()->user_email)->send(new OrderSuccessful($order));
    
        return redirect()->route('checkout.success', ['order' => $order->id]);
    }
    
    
}    