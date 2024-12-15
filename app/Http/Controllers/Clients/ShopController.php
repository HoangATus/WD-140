<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\NewComment;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function listByCategory($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $query = Product::where('category_id', $id);


        $listProduct = $query->with('variants')->paginate(8);


        $listCategory = Category::withCount('products')->get();

        return view('clients.product', compact('listProduct', 'listCategory', 'category'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy 10 sản phẩm mới nhất cùng với các biến thể
        $products = Product::with('variants')->latest()->take(12)->get();


        $bestSellingProducts = Product::with('variants')
            ->select('products.*')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->whereIn('orders.status', ['delivered', 'completed'])
            // Lọc theo thời gian của đơn hàng trong tháng hiện tại
            ->whereBetween('orders.created_at', [
                Carbon::now()->startOfMonth(),  // Bắt đầu tháng hiện tại
                Carbon::now()->endOfMonth(),    // Kết thúc tháng hiện tại
            ])
            ->groupBy('products.id')
            ->orderByRaw('SUM(order_items.quantity) DESC')
            ->take(6)
            ->get();

        // Lấy các banner đang active
        $banners = Banner::where('is_active', true)
            ->with('category')
            ->get();
        // Lấy tất cả các danh mục
        $categories = Category::query()->get();

        return view('clients.index', compact('products', 'bestSellingProducts', 'banners', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function blog()
    {
        $hotNews = News::where('status', 1)->orderBy('view_count', 'desc')->first();
        $relatedNews = News::where('status', 1)
            ->where('id', '!=', $hotNews->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $promotions = News::where('category_id', 1)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $popularNews = News::where('status', 1)
            ->orderBy('view_count', 'desc')
            // ->take(10)
            ->get()
            ->chunk(2);

        $album = News::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $categories = NewsCategory::all()->map(function ($category) {
            $category->latestNews = $category->news()
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->take(2)
                ->get();
            return $category;
        });


        return view('clients.blog', compact('hotNews', 'relatedNews', 'album', 'categories', 'promotions', 'popularNews'));
    }

    public function blogDetail($slug)
    {

        $new = News::where('slug', $slug)->with('comments.user')->firstOrFail();
        $new->increment('view_count');
        $commentCount = $new->comments->count();
        $relatedNews = News::where('category_id', $new->category_id)
            ->where('id', '!=', $new->id)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $promotions = News::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return view('clients.blogDetail', compact('new', 'relatedNews', 'commentCount', 'promotions'));
    }
    public function storeComment(Request $request, $newsId)
    {
        $request->validate(['comment' => 'required|string|max:1000']);
        $userId = Auth::id();
        $user = User::find($userId);

        $existingPendingComment = $user->comments()->where('news_id', $newsId)->where('approved', false)->first();
        if ($existingPendingComment) {
            return response()->json(['success' => false, 'message' => 'Bình luận đang chờ phê duyệt không thể bình luận tiếp.'], 400);
        }

        $comment = NewComment::create([
            'news_id' => $newsId,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
            'approved' => false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Bình luận của bạn đã được gửi.',
            'comment' => $comment->load('user'),
        ]);
    }

    public function updateComment(Request $request, $id)
    {
        $request->validate(['comment' => 'required|string|max:1000']);

        $comment = NewComment::findOrFail($id);
        if (auth()->id() === $comment->user_id) {
            $comment->comment = $request->comment;
            $comment->save();

            return response()->json([
                'success' => true,
                'message' => 'Bình luận đã được cập nhật.',
                'comment' => $comment,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Bạn không có quyền sửa bình luận này.'], 403);
    }

    public function deleteComment($id)
    {
        $comment = NewComment::findOrFail($id);
        if (auth()->id() === $comment->user_id) {
            $comment->delete();
            return response()->json(['success' => true, 'message' => 'Bình luận đã được xóa.']);
        }

        return response()->json(['success' => false, 'message' => 'Bạn không có quyền xóa bình luận này.'], 403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
