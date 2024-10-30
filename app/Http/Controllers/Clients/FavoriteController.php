<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Kiểm tra xem sản phẩm đã tồn tại trong danh sách yêu thích của người dùng chưa
        $exists = Favorite::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->exists();

        if ($exists) {
            return back()->with('errors', 'Sản phẩm này đã có trong danh sách yêu thích.');
        }

        // Nếu sản phẩm chưa tồn tại, thêm vào danh sách yêu thích
        Favorite::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
        ]);
        return redirect()->back()->with('successy', 'Sản phẩm đã được thêm vào danh sách yêu thích.');
    }

    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())
            ->with(['product.ratings']) // eager load ratings
            ->get();

        // Kiểm tra xem dữ liệu có được lấy đúng không
        if ($favorites->isEmpty()) {
            Log::info('Không có sản phẩm yêu thích nào.');
        } else {
            Log::info('Thông tin sản phẩm yêu thích:', $favorites->toArray());
        }
        return view('clients.favorites.index', compact('favorites'));
    }

    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);

        // Kiểm tra quyền sở hữu yêu thích (nếu cần)
        if ($favorite->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Bạn không có quyền xóa sản phẩm này.');
        }

        $favorite->delete();

        return redirect()->route('clients.favorites.index')->with('successy', 'Sản phẩm đã được xóa khỏi danh sách yêu thích.');
    }
}