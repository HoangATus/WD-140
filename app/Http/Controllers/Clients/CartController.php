<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $cart = Cart::with('variant.product', 'variant.color', 'variant.size')
            ->where('user_id', $userId)->get();

        $sum = $cart->reduce(function ($carry, $item) {
            return $carry + ($item->variant->variant_sale_price * $item->quantity);
        }, 0);
        $user = User::find($userId);
        $total = max(0, $sum);
        return view('clients.cart.index', [
            'cart' => $cart,
            'sum' => $sum,
            'user' => $user,
            'total' => $total
        ]);
    }

    public function add(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'variant_id' => 'required|exists:variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $variant = Variant::findOrFail($request->variant_id);

        if ($variant->quantity < $request->quantity) {
            return response()->json(['error' => 'Số lượng sản phẩm không đủ.'], 400);
        }

        $cart = Cart::where('user_id', $userId)
            ->where('variant_id', $variant->id)
            ->first();

        if ($cart) {
            $cart->quantity += $request->quantity;

            if ($cart->quantity > $variant->quantity) {
                return response()->json(['error' => 'Số lượng sản phẩm trong giỏ vượt quá tồn kho.'], 400);
            }

            $cart->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'variant_id' => $variant->id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng.'], 200);
    }

    public function update(Request $request)
    {
        $variantId = $request->variant_id;
        $quantity = $request->quantity;

        $cart = Cart::where('user_id', Auth::id())->where('variant_id', $variantId)->first();

        if (!$cart) {
            return response()->json(['error' => 'Sản phẩm không tồn tại trong giỏ hàng.'], 404);
        }

        $cart->quantity = $quantity;
        $cart->save();

        $totalAmount = $cart->variant->variant_sale_price * $cart->quantity;

        return response()->json([
            'success' => true,
            'newTotalAmount' => $totalAmount
        ]);
    }


    public function destroy($variant_id)
    {
        $user_id = auth()->id();


        $deleted = DB::table('carts')
            ->where('user_id', $user_id)
            ->where('variant_id', $variant_id)
            ->delete();

        if ($deleted) {
            return response()->json(['success' => true, 'message' => 'Sản phẩm đã được xóa khỏi giỏ hàng!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Không thể xóa sản phẩm.']);
        }
    }

    public function count()
    {
        $userId = Auth::id();
        $count = Cart::where('user_id', $userId)->sum('quantity');

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