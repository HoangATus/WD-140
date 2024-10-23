<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;



// app/Http/Controllers/Admin/CommentController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product; // Thêm import Product nếu bạn cần
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Phương thức hiển thị  luận chưa duyệt cho một sản phẩm cụ thể
    public function index()
    {
        // Lấy bình luận chưa duyệt cho sản phẩm cụ thể
        // $comments = Comment::with('product')->latest('id')->get();
        $products = Product::query()->with('category')->latest()->get();
        return view('admins.comments.index', compact('products'));
    }

    public function show($product_id)
    {
        // Lấy tất cả các bình luận của sản phẩm dựa trên product_id
        $comments = Comment::with('product')
                    ->where('product_id', $product_id)
                    ->latest('id')
                    ->get();
    
        // Trả về view và truyền danh sách bình luận vào
        return view('admins.comments.show', compact('comments'));
    }
    
    
    // Phương thức duyệt bình luận
    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->is_approved = true; // Đặt trạng thái phê duyệt
        $comment->save();

        return redirect()->back()->with('success', 'Bình luận đã được phê duyệt.');
    }

    public function cancelApprove($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->is_approved = false; // Đặt trạng thái là chưa phê duyệt
        $comment->save();

        return redirect()->back()->with('success', 'Bình luận đã bị hủy phê duyệt.');
    }
}
