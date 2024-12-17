<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Mail\OrderStatusChanged;
use App\Mail\OrderSuccessful;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Rating;
use App\Models\Variant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


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

    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);

        if (Auth::check()) {
            if ($order->user_id !== Auth::id()) {
                abort(403, 'Bạn không có quyền xem đơn hàng này.');
            }
        } else {
            abort(403, 'Bạn cần đăng nhập để xem đơn hàng.');
        }
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
        return view('clients.orders.show', compact('order'));
    }

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

        $order->statusChanges()->create([
            'old_status' => $oldStatus,
            'new_status' => Order::STATUS_CANCELED,
            'notes' => $request->cancellation_reason,
            'changed_by' => auth()->id(),
        ]);

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được hủy thành công.');
    }

    public function confirmReceipt(Order $order)
    {
        if ($order->status !== Order::STATUS_DELIVERED) {
            return redirect()->route('orders.index')->with('error', 'Đơn hàng không hợp lệ.');
        }

        $order->updateStatus(Order::STATUS_COMPLETED, 'Khách hàng đã nhận được hàng');

        return redirect()->route('orders.index')->with('success', 'Cảm ơn bạn! Đơn hàng đã được xác nhận là hoàn thành.');
    }
    public function showOrderDetail($orderId)
    {
        $order = Order::with('products.reviews')->findOrFail($orderId);

        if ($order->status !== 'Hoàn thành') {
            return redirect()->back()->with('error', 'Chỉ có thể đánh giá đơn hàng đã hoàn thành.');
        }

        return view('order-detail', compact('order'));
    }
    public function rateProduct(Request $request, $productId)
    {

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
            'order_id' => 'required|integer',
        ]);

        $orderId = $request->input('order_id');
        $order = Order::find($orderId);

        if (!$order) {
            return back()->with('error', 'Đơn hàng không tồn tại.');
        }

        $orderItem = OrderItem::where('order_id', $orderId)
            ->where('product_id', $productId)
            ->first();

        if (!$orderItem) {
            return back()->with('error', 'Sản phẩm không tồn tại trong đơn hàng.');
        }

        $existingRating = Rating::where('order_item_id', $orderItem->id)->first();
        if ($existingRating) {
            return back()->with('error', 'Bạn đã đánh giá sản phẩm này trước đó.');
        }

        $rating = new Rating();
        $rating->order_item_id = $orderItem->id;
        $rating->product_id = $orderItem->product_id;
        $rating->variant_id = $orderItem->variant_id;
        $rating->order_id = $order->id;
        $rating->rating = $request->input('rating');
        $rating->review = $request->input('review');
        $rating->user_id = auth()->id();
        $rating->save();




        return back()->with('success', 'Cảm ơn bạn đã đánh giá sản phẩm.');
    }

    public function retryPayment($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);
        if ($order->payment_status === 'paid') {
            return redirect()->route('home')->with('error', 'Đơn hàng này đã được thanh toán.');
        }

        if ($order->status === 'canceled') {
            return redirect()->route('home')->with('error', 'Đơn hàng này đã bị hủy.');
        }
        return view('clients.retryPayment', compact('order'));
    }

    public function createVNPayPaymentLink($order)
    {
        $vnp_TmnCode = env('VNP_TMN_CODE');
        $vnp_HashSecret = env('VNP_HASH_SECRET');
        $vnp_Url = env('VNP_URL');
        $vnp_ReturnUrl = route('vnpay.callback');

        $vnp_TxnRef = $order->order_code;
        $vnp_OrderInfo = "Thanh toán đơn hàng " . $order->order_code;
        $vnp_Amount = $order->total * 100;
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
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect()->away($vnp_Url);
    }
    public function vnpayCallback(Request $request)
    {
        try {
            $vnp_HashSecret = env('VNP_HASH_SECRET');
            $inputData = $request->all();
            $vnp_SecureHash = $inputData['vnp_SecureHash'];
            unset($inputData['vnp_SecureHash']);
            unset($inputData['vnp_SecureHashType']);

            ksort($inputData);
            $hashData = "";
            foreach ($inputData as $key => $value) {
                $hashData .= '&' . urlencode($key) . '=' . urlencode($value);
            }
            $hashData = trim($hashData, '&');
            $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

            if ($secureHash !== $vnp_SecureHash) {
                return redirect()->route('home')->with('error', 'Xác thực không thành công.');
            }

            $orderCode = $inputData['vnp_TxnRef'];
            $order = Order::where('order_code', $orderCode)->first();

            if (!$order) {
                return redirect()->route('home')->with('error', 'Đơn hàng không tồn tại.');
            }

            if ($inputData['vnp_ResponseCode'] === '00') {
                $order->update(['payment_status' => 'paid']);
                return redirect()->route('checkout.success', ['order' => $order->id])
                    ->with('success', 'Thanh toán thành công!');
            } else {
                $order->update(['payment_status' => 'pending']);
                return redirect()->route('checkout.pending', ['order' => $order->id])
                    ->with('success', 'Thanh toán ko thành công!');
            }
        } catch (\Exception $e) {
            Log::error('Lỗi khi xử lý callback VNPay: ' . $e->getMessage());
            return redirect()->route('checkout.checkout2')->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
        }
    }
    public function processRetryPayment(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'name'            => 'required|string|max:255',
            'phone'           => 'required|string|max:20',
            'address'         => 'required|string|max:500',
            'notes'           => 'nullable|string|max:1000',
            'payment_method' => 'required|in:cod,online',

        ]);

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->notes = $request->notes;

        $order->payment_method = $request->payment_method;
        if ($order->payment_method == 'online' && $order->total < 5000) {
            return redirect()->back()->with('error', 'Đơn hàng thanh toán trực tuyến, Đơn hàng phải có Thành tiền tối thiểu là 5,000 VND.');
        }
        if ($request->payment_method === 'cod') {

            $order->save();

            return redirect()->route('orders.show', $order->id)
                ->with('success', 'Đơn hàng đã được cập nhật và thanh toán bằng COD.');
        } elseif ($request->payment_method === 'online') {
            return $this->createVNPayPaymentLink($order);
        }

        return redirect()->route('orders.show', $order->id)
            ->with('error', 'Phương thức thanh toán không hợp lệ.');
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        ));
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
