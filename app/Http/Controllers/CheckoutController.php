<?php

namespace App\Http\Controllers;

use PayOS\PayOS;
use App\Models\Order;
use App\Models\Variant;
use App\Models\Checkout;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreCheckoutRequest;
use App\Http\Requests\UpdateCheckoutRequest;
use App\Models\User;

class CheckoutController extends Controller
{

    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        $user = Auth::user();

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('clients.checkout.index', compact('cart', 'total', 'user'));
    }

    /**
     * Xử lý đơn hàng
     */
    public function process(Request $request)
    {
        // Kiểm tra nếu có yêu cầu hủy đơn hàng
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

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Tính tổng tiền
        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

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
                'product_name' => $item['product_name'],
                'variant_name' => $item['variant_name'],
                'price'       => $item['price'],
                'quantity'    => $item['quantity'],
                'image'       => $item['image'],
            ]);
        }

        // Xóa giỏ hàng sau khi đặt hàng thành công
        session()->forget('cart');

        // Kiểm tra phương thức thanh toán
        if ($request->payment_method == 'online') {
            // Gọi createPaymentLink để tạo link thanh toán nếu người dùng chọn thanh toán online
            return $this->createPaymentLink($order);
        }

        // Nếu chọn COD (Cash on Delivery), chuyển hướng đến trang xác nhận đơn hàng
        return redirect()->route('checkout', ['order' => $order->id])->with('success', 'Đơn hàng của bạn đã được đặt thành công! Phương thức thanh toán: COD');
    }





    function generateUniqueOrderCode()
    {
        do {
            // Tạo mã đơn hàng là một số nguyên dương ngẫu nhiên trong khoảng an toàn
            $orderCode = random_int(1, 9007199254740991);
        } while (Order::where('order_code', $orderCode)->exists());

        return $orderCode; // Trả về mã đơn hàng dưới dạng số
    }

    public function success()
    {
        return view('clients.checkout.orderSuccess');
    }


    public function createPaymentLink($order)
    {
        // Lấy thông tin từ file .env
        $payOSClientId = env('PAYOS_CLIENT_ID');
        $payOSApiKey = env('PAYOS_API_KEY');
        $payOSChecksumKey = env('PAYOS_CHECKSUM_KEY');

        // Khởi tạo PayOS
        $payOS = new PayOS($payOSClientId, $payOSApiKey, $payOSChecksumKey);

        $YOUR_DOMAIN = 'http://127.0.0.1:8000';  // Hoặc domain của bạn

        // Dữ liệu order để tạo link thanh toán
        $data = [
            "orderCode" => $this->generateUniqueOrderCode(),
            "amount" => $order->total,
            "description" => substr("TTĐH #" . $order->order_code, 0, 25),
            "items" => $order->orderItems->map(function ($item) {
                return [
                    'name' => $item->product_name,
                    'price' => $item->price,
                    'quantity' => $item->quantity
                ];
            })->toArray(),
            "returnUrl" => $YOUR_DOMAIN . "/",
            "cancelUrl" => $YOUR_DOMAIN . "/"
        ];

        // Tạo link thanh toán
        $response = $payOS->createPaymentLink($data);

        // Chuyển hướng người dùng đến link thanh toán
        return redirect()->away($response['checkoutUrl']);
    }


    //     public function showPaymentForm($id)
    // {
    //     // Lấy thông tin thanh toán của khách hàng từ database
    //     $user = User::find($id);

    //     // Truyền dữ liệu vào view
    //     return view('clients.checkout.index', compact('user'));
    // }
}
