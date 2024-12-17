<?php

namespace App\Http\Controllers;

use App\Mail\OrderSuccessful;
use App\Models\Order;
use App\Models\Variant;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\UserVoucher;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        $vouchers = Voucher::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where('quantity', '>', 0)
            ->whereHas('users', function ($query) use ($user) {
                $query->where('user_voucher.user_id', $user->user_id); // Sửa để dùng 'id' chính xác
            })
            ->get();
        // dd(session()->all());


        return view('clients.checkout.index', compact('user', 'cart', 'total', 'vouchers', 'appliedPoints', 'discountAmount'));
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
            'payment_method'  => 'required|in:cod,online',
        ]);

        $userId = Auth::id();
        $user = User::find($userId);
        $cart = session()->get('cart_' . $userId, []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $total = session()->get('cart_total', 0);
        $usedPoints = session()->get('applied_loyalty_points', 0);

        $params['order_code'] = $this->generateUniqueOrderCode();
        $paymentStatus = $request->payment_method == 'online' ? 'paid' : 'pending';
        $order = Order::create([
            'user_id'        => $userId,
            'order_code'     => $params['order_code'],
            'name'           => $request->name,
            'phone'          => $request->phone,
            'address'        => $request->address,
            'notes'          => $request->notes,
            'total'          => $total,
            'payment_status' => $paymentStatus,
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

        if ($usedPoints > 0) {
            $user->points -= $usedPoints;
            $user->save();
        }

        session()->forget('cart_' . $userId);
        session()->forget('cart_total');
        session()->forget('applied_loyalty_points');

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
                return redirect()->back()->with('error', 'Xác thực không thành công.');
            }

            $orderCode = $inputData['vnp_TxnRef'];
            $order = Order::where('order_code', $orderCode)->first();

            if (!$order) {
                return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
            }

            if ($inputData['vnp_ResponseCode'] === '00') {
                $order->update(['payment_status' => 'paid']);
                return redirect()->route('checkout.success', ['order' => $order->id])
                    ->with('success', 'Thanh toán thành công!');
            } else {
                $order->update(['payment_status' => 'pending']);
                return redirect()->route('checkout.pending', ['order' => $order->id])
                    ->with('errorss', 'Thanh toán ko thành công!');
            }
        } catch (\Exception $e) {
            Log::error('Lỗi khi xử lý callback VNPay: ' . $e->getMessage());
            return redirect()->route('checkout.checkout2')->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
        }
    }
    public function pending(Order $order)
    {
        if ($order->payment_status === 'paid') {
            return redirect()->route('home')->with('error', 'Đơn hàng này đã được thanh toán.');
        }

        if ($order->status === 'canceled') {
            return redirect()->route('home')->with('error', 'Đơn hàng này đã bị hủy.');
        }
        if (
            $order->payment_method === 'online'
            && $order->payment_status === 'pending'
            && $order->created_at <= Carbon::now()->subHours(24)
        ) {
            $order->payment_status = 'failed';
            $order->status = 'canceled';
            $order->save();
        }
        $remainingTime = Carbon::parse($order->created_at)->addDay()->diffInSeconds(now());

        $categoryIds = $order->orderItems->pluck('product.category_id')->unique();

        $relatedProducts = Product::whereIn('category_id', $categoryIds)
            ->whereNotIn('id', $order->orderItems->pluck('product_id'))
            ->limit(10)
            ->get();

        return view('clients.checkout.pending', compact('order', 'remainingTime', 'relatedProducts'));
    }

    function generateUniqueOrderCode()
    {
        do {
            $orderCode = 'ATUS' . Auth::id() . now()->timestamp . random_int(1000, 9999);
        } while (Order::where('order_code', $orderCode)->exists());

        return $orderCode;
    }


    public function checkVoucher($code)
    {
        $voucher = Voucher::where('code', $code)
            ->where('is_active', true)
            ->where('is_public', true)
            ->where('end_date', '>=', now())
            ->where('quantity', '>', 0)
            ->first();

        if ($voucher) {
            $userId = Auth::id();
            $user = User::find($userId);
            $isUsed = Order::where('user_id', $userId)
                ->where('voucher_id', $voucher->id)
                ->exists();

            if ($isUsed) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bạn đã sử dụng mã voucher này trước đây.'
                ]);
            }

            $isSaved = $user->vouchers()->where('voucher_id', $voucher->id)->exists();

            return response()->json([
                'success' => true,
                'voucher' => [
                    'id' => $voucher->id,
                    'code' => $voucher->code,
                    'discount_percent' => $voucher->discount_percent,
                    'max_discount_amount' => $voucher->max_discount_amount,
                    'discount_value' => $voucher->discount_value,
                    'discount_type' => $voucher->discount_type,
                    'min_order_amount' => $voucher->min_order_amount,
                    'end_date' => $voucher->end_date,
                ],
                'is_saved' => $isSaved
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Mã voucher không hợp lệ hoặc không hoạt động.'
        ]);
    }

    public function getUserVouchers()
    {
        $user = auth()->user();
        $vouchers = Voucher::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where('quantity', '>', 0)
            ->whereHas('users', function ($query) use ($user) {
                $query->where('user_voucher.user_id', $user->user_id);
            })
            ->orderByDesc('max_discount_amount')
            ->get();
        foreach ($vouchers as $voucher) {
            $usedQuantity = Order::where('voucher_id', $voucher->id)->count();
            $totalVoucherQuantity = $voucher->quantity + $usedQuantity;

            $voucher->used_quantity = $usedQuantity;
            $voucher->total_quantity = $totalVoucherQuantity;
        }

        return response()->json(['vouchers' => $vouchers]);
    }

    public function saveVoucher(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $voucher = Voucher::where('code', $request->code)->first();

        if (!$voucher) {
            return response()->json(['success' => false, 'message' => 'Voucher không tồn tại.']);
        }

        $userId = Auth::id();
        $user = User::find($userId);

        if ($user->vouchers()->where('voucher_id', $voucher->id)->exists()) {
            return response()->json(['success' => false, 'message' => 'Voucher đã được lưu trước đó.']);
        }

        $user->vouchers()->attach($voucher->id);

        return response()->json(['success' => true, 'message' => 'Voucher đã được lưu!']);
    }

    public function detailVoucher($id)
    {

        $voucher = Voucher::find($id);
        if (!$voucher) {
            return redirect()->route('home')->with('error', 'Voucher không tồn tại.');
        }
        return view('clients.checkout.voucher', compact('voucher'));
    }

    public function checkout2(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('errorss', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $variantId = $request->input('variant_id');
        $quantity = $request->input('quantity');
        $variant = Variant::find($variantId);

        if (!$variant) {
            return redirect()->route('products.index')
                ->with('error', 'Không tìm thấy sản phẩm.');
        }

        if (!$quantity || $quantity < 1) {
            return redirect()->route('products.show', ['slug' => $variant->product->slug])
                ->with('error', 'Thông tin không hợp lệ.');
        }

        if ($variant->quantity < $quantity) {
            return redirect()->route('products.show', ['slug' => $variant->product->slug])
                ->with('error', 'Sản phẩm không đủ số lượng.');
        }

        $user = auth()->user();
        $vouchers = Voucher::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where('quantity', '>', 0)
            ->whereHas('users', function ($query) use ($user) {
                $query->where('user_voucher.user_id', $user->user_id);
            })
            ->get();

        $total = $variant->variant_sale_price * $quantity;
        $pointsToMoneyRate = 1;
        $discount = min($user->points * $pointsToMoneyRate, $total);
        $finalTotal = $total - $discount;

        return view('clients.checkout.checkout2', compact('variant', 'vouchers', 'user', 'quantity', 'total', 'discount', 'finalTotal'));
    }

    public function process2(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:500',
                'notes' => 'nullable|string|max:1000',
                'payment_method' => 'required|in:cod,online',
                'variant_id' => 'required|exists:variants,id',
                'quantity' => 'required|integer|min:1',
                'pointsDiscount' => 'nullable|integer|min:0|max:' . Auth::user()->points,
                'selectedVoucher' => 'nullable|exists:vouchers,id',
                'final_total' => 'required|numeric|min:0',
                'initial_total' => 'required|numeric|min:0',
            ]);

            $userId = Auth::id();
            $user = User::find($userId);
            $variant = Variant::with(['color', 'size'])->find($request->variant_id);


            if ($variant->quantity < $request->quantity) {
                return redirect()->route('products.show', ['slug' => $variant->product->slug])
                    ->with('error', 'Số lượng sản phẩm không đủ.');
            }
<<<<<<< HEAD
    if ($request->payment_method == 'online' && $request->final_total < 5000) {
        return redirect()->back()->with('error', 'Đơn hàng thanh toán , Đơn hàng phải có Thành tiền tối thiểu là 5,000 VND.');
    }
=======

            if ($request->payment_method == 'online' && $request->final_total < 5000) {
                return redirect()->back()->with('error', 'Đơn hàng thanh toán , Đơn hàng phải có Thành tiền tối thiểu là 5,000 VND.');
            }
>>>>>>> e515311060a895ddb49bff7f112504e9c1450e1d

            $order = Order::create([
                'user_id' => $user->user_id,
                'order_code' => $this->generateUniqueOrderCode(),
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'notes' => $request->notes,
                'total' => $request->final_total,

                'discount' => $request->initial_total - $request->final_total,
<<<<<<< HEAD

=======
>>>>>>> e515311060a895ddb49bff7f112504e9c1450e1d
                'status'         => 'pending',


                'points_discount' => $request->pointsDiscount ?? 0,
                'voucher_discount' => $request->voucherDiscount ?? 0,
                'status' => 'pending',
                'payment_method' => $request->payment_method,
                'voucher_id' => $request->selectedVoucher,
            ]);


            if ($request->final_total == 0) {
                $order->update(['payment_status' => 'paid']);
            }
            $variant->quantity -= $request->quantity;
            $variant->save();


            OrderItem::create([
                'order_id' => $order->id,
                'variant_id' => $variant->id,
                'product_id' => $variant->product_id,
                'product_name' => $variant->product->product_name,
                'variant_name' => $variant->color->name . '-' . $variant->size->attribute_size_name,
                'price' => $variant->variant_sale_price,
                'quantity' => $request->quantity,
                'image' => Storage::url($variant->image),
            ]);


            if ($request->has('pointsDiscount') && $request->pointsDiscount > 0) {
                $user->points -= $request->pointsDiscount;
                $user->save();
            }


            if ($request->has('selectedVoucher')) {
                $voucher = Voucher::find($request->selectedVoucher);
                if ($voucher) {

                    if ($voucher->quantity <= 0) {
                        return back()->with('errors', 'Voucher đã hết lượt.');
                    }
                    if (Carbon::parse($voucher->end_date)->lessThan(Carbon::now())) {
                        return back()->with('error', 'Voucher đã hết hạn.');
                    }

                    $voucher->quantity -= 1;
                    $voucher->save();


                    $user->vouchers()->detach($voucher->id);


                    if ($voucher->quantity <= 0) {
                        $voucher->is_active = '0';
                        $voucher->save();
                    }
                } else {
                    Log::info('Voucher không tồn tại hoặc không hợp lệ.');
                }
            }


            if ($request->payment_method == 'online') {
                return $this->createVNPayPaymentLink($order);
            }


            Mail::to($user->user_email)->send(new OrderSuccessful($order));
            return redirect()->route('checkout.success', ['order' => $order->id]);
        } catch (\Exception $e) {
            Log::error('Lỗi khi xử lý thanh toán: ' . $e->getMessage());
            return redirect()->route('checkout.checkout2')->with('error', 'Có lỗi xảy ra trong quá trình thanh toán. Vui lòng thử lại.');
        }
    }
}
