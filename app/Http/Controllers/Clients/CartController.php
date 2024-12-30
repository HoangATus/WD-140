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
    public function index(Request $request)
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
         $total = max(0, $sum );

         session(['cart_total' => $total]);

        return view('clients.cart.index', compact('cart', 'sum', 'total', 'user'));
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
            return response()->json(['error' => 'Số lượng không được vượt quá tồn kho.'], 400);
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

    /**
     * Xóa sản phẩm khỏi giỏ hàng
     */
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

    /**
     * Đếm tổng số lượng sản phẩm trong giỏ hàng
     */
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

    public function updateCarTotal(Request $request)
    {
        $finalTotal = $request->input('final_total');
        $voucherDiscount = $request->input('voucher_discount', 0); 
        $pointsDiscount = $request->input('points_discount', 0); 
        $voucherId = $request->input('selected_voucher', null); 

        session()->put('cart_total', $finalTotal);
        session()->put('voucher_discount', $voucherDiscount);
        session()->put('points_discount', $pointsDiscount);
        if ($voucherId) {
            session()->put('selected_voucher', $voucherId);
        }
        return response()->json([
            'success' => true,
            'message' => 'Thành tiền và các khuyến mãi đã được lưu vào session',
        ]);
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

    
}