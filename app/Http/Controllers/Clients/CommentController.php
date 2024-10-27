<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            // 'user_name' => 'required|string|max:255',
            'comment' => 'required|string|max:1000',
        ]);

        Comment::create([
            'product_id' => $productId,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('successs', 'Bình luận của bạn đã được gửi và đang chờ phê duyệt.');
    }

    public function index(Request $request, $productId) {}
}
