<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $products = Product::query()->with('category')->latest()->get();
        return view('admins.comments.index', compact('products'));
    }

    public function show($product_id)
    {
        $comments = Comment::with('product')
            ->where('product_id', $product_id)
            ->latest('id')
            ->get();
        return view('admins.comments.show', compact('comments'));
    }


    
    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->is_approved = true; 
        $comment->save();
        return redirect()->back()->with('success', 'Bình luận đã được phê duyệt.');
    }

    public function cancelApprove($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->is_approved = false; 
        $comment->save();
        return redirect()->back()->with('success', 'Bình luận đã bị hủy phê duyệt.');
    }
}
