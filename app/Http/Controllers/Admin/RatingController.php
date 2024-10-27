<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating; // Thêm nếu bạn có model Rating
use App\Models\Order; // Thêm nếu cần

class RatingController extends Controller
{
    public function index()
    {
        // Lấy tất cả các đánh giá
        $ratings = Rating::all(); // Giả sử bạn có model Rating
        return view('admins.ratings.index', compact('ratings'));
    }

    public function show($id)
    {
        // Hiển thị chi tiết đánh giá
        $rating = Rating::findOrFail($id);
        return view('admins.ratings.show', compact('rating'));
    }
    // public function hide($id)
    // {
    //     // Tìm đánh giá theo ID
    //     $rating = Rating::findOrFail($id);

    //     // Cập nhật cột 'hidden' để ẩn đánh giá
    //     $rating->update(['hidden' => true]);

    //     // Chuyển hướng về trang danh sách đánh giá với thông báo thành công
    //     return redirect()->route('admins.ratings.index')->with('success', 'Đánh giá đã được ẩn thành công.');
    // }
    public function hide($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->hidden = true; // Đặt trạng thái hidden thành true
        $rating->save();

        return redirect()->back()->with('success', 'Đánh giá đã được ẩn thành công.');
    }
    // public function hideRating($id)
    // {
    //     $rating = Rating::findOrFail($id);
    //     $rating->hidden = true; // Đánh dấu là ẩn
    //     $rating->save();

    //     return redirect()->back()->with('success', 'Đánh giá đã được ẩn.');
    // }

    public function unhide($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->hidden = false;
        $rating->save();

        return redirect()->route('admins.ratings.show', $id)->with('success', 'Đánh giá đã được hiện lại thành công.');
    }


    public function update(Request $request, $id)
    {
        // Logic để cập nhật đánh giá (nếu cần)
    }
}