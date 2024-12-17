<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function applyLoyaltyPoints(Request $request)
    {
        $appliedPoints = $request->input('applied_points', 0);
        $user = Auth::user();
        $pointValue = 1;

        $totalAfterDiscount = session('cart_total', 0);

        session([
            'applied_loyalty_points' => $appliedPoints,
            'checkout_total' => $totalAfterDiscount
        ]);

        return response()->json(['status' => 'success']);
    }
    public function index()
    {
        $userId = Auth::id();
        $cart = session()->get('cart_' . $userId, []);
        $variantIds = array_keys($cart);

        $variants = Variant::whereIn('id', $variantIds)->get();

        foreach ($cart as $variantId => &$item) {
            $variant = $variants->firstWhere('id', $variantId);

            $item['stock'] = $variant ? $variant->quantity : 0;
        }

        session()->put('cart_' . $userId, $cart);

        $sum = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $user = User::find($userId);
        $loyaltyPoints = $user ? $user->points : 0;
        $appliedPoints = session()->get('applied_loyalty_points', 0);
        $pointValue = 1;
        $discountAmount = $appliedPoints * $pointValue;
        $total = max(0, $sum - $discountAmount);

        session(['cart_total' => $total, 'discount_amount' => $discountAmount]);

        return view('clients.cart.index', compact('cart', 'sum', 'total', 'loyaltyPoints', 'appliedPoints', 'discountAmount', 'user'));
    }


    private function updateCartTotal($cart, $userId)
    {
        $sum = 0;
        foreach ($cart as $item) {
            $sum += $item['price'] * $item['quantity'];
        }

        $user = User::find($userId);
        $loyaltyPoints = $user ? $user->points : 0;
        $appliedPoints = session()->get('applied_loyalty_points', 0);
        $appliedPoints = min($appliedPoints, $loyaltyPoints);
        $pointValue = 1;
        $discountAmount = $appliedPoints * $pointValue;
        $total = max(0, $sum - $discountAmount);

        session([
            'cart_total' => $total,
            'discount_amount' => $discountAmount,
            'applied_loyalty_points' => $appliedPoints,
        ]);
    }


    public function update(Request $request)
    {
        $variantId = $request->input('variant_id');
        $newQuantity = $request->input('quantity');

        $variant = Variant::find($variantId);

        if (!$variant) {
            return response()->json(['error' => 'Sản phẩm không tồn tại.'], 404);
        }

        if ($newQuantity > $variant->quantity) {
            return response()->json(['error' => 'Số lượng không được vượt quá tồn kho hiện tại.'], 400);
        }

        $userId = Auth::id();
        $cart = session()->get('cart_' . $userId, []);

        if (isset($cart[$variantId])) {
            $cart[$variantId]['quantity'] = $newQuantity;
        }

        session()->put('cart_' . $userId, $cart);

        return response()->json(['success' => 'Cập nhật thành công.']);
    }

    public function add(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'variant_id' => 'required|exists:variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $variant = Variant::with(['product', 'color', 'size'])->findOrFail($request->variant_id);

        $cart = session()->get('cart_' . $userId, []);
        $currentQuantityInCart = isset($cart[$variant->id]) ? $cart[$variant->id]['quantity'] : 0;
        $requestedQuantity = $currentQuantityInCart + $request->quantity;

        if ($requestedQuantity > $variant->quantity) {
            return response()->json(['message' => 'Bạn đã thêm toàn bộ số lượng sản phẩm vào giỏ hàng.'], 400);
        }

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

        session()->put('cart_' . $userId, $cart);
        $this->updateCartTotal($cart, $userId);

        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng thành công.'], 200);
    }

    public function remove(Request $request)
    {
        $userId = Auth::id();

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

    public function count()
    {
        $userId = Auth::id();
        $cart = session()->get('cart_' . $userId, []);
        $count = 0;

        foreach ($cart as $item) {
            $count += $item['quantity'];
        }

        return response()->json(['count' => $count], 200);
    }
}
