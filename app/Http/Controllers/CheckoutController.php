<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Variant;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Lấy ID của người dùng đang đăng nhập
        $user = User::find($userId); // Lấy thông tin người dùng
        $cart = session()->get('cart_' . $userId, []); // Lấy giỏ hàng theo ID người dùng
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('clients.checkout.index', compact('cart', 'total', 'user')); // Truyền biến $user vào view
    }

    /**
     * Xử lý đơn hàng
     */
    public function process(Request $request)
    {
        if ($request->has('cancel_order')) {
            return $this->cancelOrder($request->input('order_id'));
        }

        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'notes'   => 'nullable|string|max:1000',
            'payment_method' => 'required|in:cod,online',  // Chỉ chấp nhận COD hoặc online
        ]);

        $userId = Auth::id(); // Lấy ID của người dùng đang đăng nhập
        $cart = session()->get('cart_' . $userId, []); // Lấy giỏ hàng theo ID người dùng

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $params['order_code'] = $this->generateUniqueOrderCode();

        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => $userId,
            'order_code' => $params['order_code'],
            'name'    => $request->name,
            'phone'   => $request->phone,
            'address' => $request->address,
            'notes'   => $request->notes,
            'total'   => $total,
            'status'  => 'pending',
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
                'order_id'    => $order->id,
                'variant_id'  => $variant_id,
                'product_id'  => $item['product_id'],
                'product_name' => $item['product_name'],
                'variant_name' => $item['variant_name'],
                'price'       => $item['price'],
                'quantity'    => $item['quantity'],
                'image'       => $item['image'],
            ]);
        }

        session()->forget('cart_' . $userId);

        if ($request->payment_method == 'online') {
            return $this->createVNPayPaymentLink($order); // Chuyển sang xử lý thanh toán với VNPay
        }

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
            $orderCode = random_int(1, 9007199254740991);
        } while (Order::where('order_code', $orderCode)->exists());

        return $orderCode;
    }
}
