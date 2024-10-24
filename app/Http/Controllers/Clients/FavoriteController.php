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
            return back()->with('error', 'Sản phẩm này đã có trong danh sách yêu thích.');
        }

        // Nếu sản phẩm chưa tồn tại, thêm vào danh sách yêu thích
        Favorite::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
        ]);
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào danh sách yêu thích.');
    }

    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())->with('product')->get();
        
        // Kiểm tra xem dữ liệu có được lấy đúng không
        if ($favorites->isEmpty()) {
            Log::info('Không có sản phẩm yêu thích nào.');
        } else {
            Log::info('Thông tin sản phẩm yêu thích:', $favorites->toArray());
        }
        return view('clients.favorites.index', compact('favorites'));
    }
    
}
