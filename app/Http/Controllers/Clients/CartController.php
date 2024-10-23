<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    /**
     * Hiển thị giỏ hàng
     */
    public function index()
    {
        $userId = Auth::id(); // Lấy ID của người dùng hiện tại
        $cart = session()->get('cart_' . $userId, []); // Lấy giỏ hàng theo ID người dùng
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('clients.cart.index', compact('cart', 'total'));
    }

    /**
     * Thêm sản phẩm vào giỏ hàng
     */
    public function add(Request $request)
    {
        $userId = Auth::id(); // Lấy ID người dùng hiện tại
        
        $request->validate([
            'variant_id' => 'required|exists:variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $variant = Variant::with(['product', 'color', 'size'])->findOrFail($request->variant_id);

        if ($variant->quantity < $request->quantity) {
            return response()->json(['message' => 'Số lượng sản phẩm không đủ.'], 400);
        }

        // Lấy giỏ hàng hiện tại của người dùng từ session
        $cart = session()->get('cart_' . $userId, []);

        if (isset($cart[$variant->id])) {
            $cart[$variant->id]['quantity'] += $request->quantity;
        } else {
            $cart[$variant->id] = [
                'product_id' => $variant->product->id,
                'product_name' => $variant->product->product_name,
                'variant_name' => $variant->color->name . ' - ' . $variant->size->attribute_size_name,
                'price' => $variant->variant_sale_price,
                'quantity' => $request->quantity,
                'image' => Storage::url($variant->image),
            ];
        }

        // Lưu giỏ hàng vào session với ID người dùng
        session()->put('cart_' . $userId, $cart);

        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng thành công.'], 200);
    }

    /**
     * Cập nhật số lượng sản phẩm trong giỏ hàng
     */
    public function update(Request $request)
    {
        $userId = Auth::id(); // Lấy ID người dùng hiện tại

        $request->validate([
            'variant_id' => 'required|exists:variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart_' . $userId, []);

        if (isset($cart[$request->variant_id])) {
            $variant = Variant::findOrFail($request->variant_id);

            if ($variant->quantity < $request->quantity) {
                return response()->json(['message' => 'Số lượng sản phẩm không đủ.'], 400);
            }

            // Cập nhật số lượng trong giỏ hàng
            $cart[$request->variant_id]['quantity'] = $request->quantity;
            session()->put('cart_' . $userId, $cart);

            return response()->json(['message' => 'Giỏ hàng đã được cập nhật.'], 200);
        }

        return response()->json(['message' => 'Sản phẩm không tồn tại trong giỏ hàng.'], 404);
    }

    /**
     * Xóa sản phẩm khỏi giỏ hàng
     */
    public function remove(Request $request)
    {
        $userId = Auth::id(); // Lấy ID người dùng hiện tại

        $request->validate([
            'variant_id' => 'required|exists:variants,id',
        ]);

        $cart = session()->get('cart_' . $userId, []);

        if (isset($cart[$request->variant_id])) {
            unset($cart[$request->variant_id]);
            session()->put('cart_' . $userId, $cart);

            return response()->json(['message' => 'Sản phẩm đã được xóa khỏi giỏ hàng.'], 200);
        }

        return response()->json(['message' => 'Sản phẩm không tồn tại trong giỏ hàng.'], 404);
    }

    /**
     * Đếm tổng số lượng sản phẩm trong giỏ hàng
     */
    public function count()
    {
        $userId = Auth::id(); // Lấy ID người dùng hiện tại
        $cart = session()->get('cart_' . $userId, []);
        $count = 0;

        foreach ($cart as $item) {
            $count += $item['quantity'];
        }

        return response()->json(['count' => $count], 200);
    }
}