<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Banner;
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

        $exists = Favorite::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->exists();

        if ($exists) {
            return back()->with('errors', 'Sản phẩm này đã có trong danh sách yêu thích.');
        }
        Favorite::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
        ]);
        return redirect()->back()->with('successy', 'Sản phẩm đã được thêm vào danh sách yêu thích.');
    }

    public function index()
    {

        $favorites = Favorite::where('user_id', Auth::id())
            ->with(['product.ratings'])
            ->get();
        $banners = Banner::where('is_active', true)
            ->with('category')
            ->get();

        if ($favorites->isEmpty()) {
            Log::info('Không có sản phẩm yêu thích nào.');
        } else {
            Log::info('Thông tin sản phẩm yêu thích:', $favorites->toArray());
        }
        return view('clients.favorites.index', compact('favorites', 'banners'));
    }

    public function destroy($id)
    {

        $favorite = Favorite::find($id);

        if (!$favorite) {
            return redirect()->back()->with('errorss', 'Sản phẩm không còn trong danh sách yêu thích.');
        }

        if ($favorite->user_id !== auth()->id()) {
            return redirect()->back()->with('errorss', 'Bạn không có quyền xóa sản phẩm này.');
        }

        try {
            $favorite->delete();
            return redirect()->route('clients.favorites.index')->with('successyy', 'Sản phẩm đã được xóa khỏi danh sách yêu thích.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa sản phẩm yêu thích:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('errorss', 'Đã xảy ra lỗi. Vui lòng thử lại sau.');
        }
    }
}
