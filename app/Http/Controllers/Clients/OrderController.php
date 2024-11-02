<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Mail\OrderStatusChanged;
use App\Mail\OrderSuccessful;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Rating;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function showOrderDetail($orderId)
    {
        $order = Order::with('products.reviews')->findOrFail($orderId);

    

        // Kiểm tra xem đơn hàng có trạng thái "Hoàn thành" hay không
        if ($order->status !== 'Hoàn thành') {
            return redirect()->back()->with('error', 'Chỉ có thể đánh giá đơn hàng đã hoàn thành.');
        }

        return view('order-detail', compact('order'));
    }
    public function rateProduct(Request $request, $productId)
    {
        // Kiểm tra tất cả dữ liệu được gửi
        // dd($request->all());

        // Validate dữ liệu từ form
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
            'order_id' => 'required|integer', // Đảm bảo có order_id
        ]);

        // Lấy order_id từ request
        $orderId = $request->input('order_id');
        $order = Order::find($orderId); // Tìm đơn hàng

        if (!$order) {
            return back()->with('error', 'Đơn hàng không tồn tại.');
        }

        // Tìm sản phẩm trong đơn hàng
        $orderItem = OrderItem::where('order_id', $orderId)
            ->where('product_id', $productId)
            ->first();

        if (!$orderItem) {
            return back()->with('error', 'Sản phẩm không tồn tại trong đơn hàng.');
        }

        // Tiến hành đánh giá sản phẩm
        $existingRating = Rating::where('order_item_id', $orderItem->id)->first();
        if ($existingRating) {
            return back()->with('error', 'Bạn đã đánh giá sản phẩm này trước đó.');
        }

        // Tạo mới đánh giá
        $rating = new Rating();
        $rating->order_item_id = $orderItem->id;
        $rating->product_id = $orderItem->product_id; // Gán giá trị cho product_id
        $rating->variant_id = $orderItem->variant_id; 
        $rating->order_id = $order->id; // Gán giá trị cho order_id
        $rating->rating = $request->input('rating');
        $rating->review = $request->input('review');
        $rating->user_id = auth()->id(); // Nếu bạn cần thêm user_id
        $rating->save();




        return back()->with('success', 'Cảm ơn bạn đã đánh giá sản phẩm.');
    }
}
