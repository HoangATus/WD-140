<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Order;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::all();
        return view('admins.ratings.index', compact('ratings'));
    }

    public function show($id)
    {
        $rating = Rating::findOrFail($id);
        return view('admins.ratings.show', compact('rating'));
    }
    public function hide($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->hidden = true;
        $rating->save();

        return redirect()->back()->with('success', 'Đánh giá đã được ẩn thành công.');
    }
    public function unhide($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->hidden = false;
        $rating->save();

        return redirect()->route('admins.ratings.show', $id)->with('success', 'Đánh giá đã được hiện lại thành công.');
    }


    public function update(Request $request, $id) {}
}
