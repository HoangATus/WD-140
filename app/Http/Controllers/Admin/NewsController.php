<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewComment;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{


    public function index()
    {
        $news = News::with('category')->latest('id')->get();
        return view('admins.news.index', compact('news'));
    }

    public function create()
    {
        $categories = NewsCategory::all();
        return view('admins.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:news|max:255',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:5048',
        ], [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.unique' => 'Tiêu đề này đã tồn tại, vui lòng chọn tiêu đề khác.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'content.required' => 'Nội dung là bắt buộc.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'image.image' => 'File tải lên phải là một hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, webp, hoặc gif.',
            'image.required' => 'Hình ảnh là bắt buộc.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 5MB.',
        ]);
        

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
        }

        News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $imagePath,
            'author' => $request->author ?? 'admins',
            'status' => $request->status ? 1 : 0,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admins.news.index')->with('success', 'Tin tức đã được thêm!');
    }
    public function approve($id)
    {
        $comment = NewComment::findOrFail($id);
        $comment->approved = true;
        $comment->save();
    
        return redirect()->route('admins.news.show', $comment->news_id)->with('message', 'Bình luận đã được phê duyệt');
    }
    
    public function unapprove($id)
    {
        $comment = NewComment::findOrFail($id);
        $comment->approved = false;
        $comment->save();
    
        return redirect()->route('admins.news.show', $comment->news_id)->with('message', 'Bình luận đã hủy phê duyệt');
    }
    
    


    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = NewsCategory::all();
        return view('admins.news.edit', compact('news', 'categories'));
    }
    public function show($id)
    {
        $news = News::with('category', 'comments')->findOrFail($id); 
        $commentCount = $news->comments->count();
        return view('admins.news.show', compact('news','commentCount'));
    }
    
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|unique:news,title,' . $news->id,
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5048',
        ], [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.unique' => 'Tiêu đề này đã tồn tại, vui lòng chọn tiêu đề khác.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'content.required' => 'Nội dung là bắt buộc.',
            // 'image.required' => 'Hình ảnh là bắt buộc.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'image.image' => 'File tải lên phải là một hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, webp, hoặc gif.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 5MB.',
        ]);

        $imagePath = $news->image;
        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $imagePath = $request->file('image')->store('news', 'public');
        }

        $news->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $imagePath,
            'author' => $request->author ?? 'admins',
            'status' => $request->status ? 1:0,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admins.news.index')->with('success', 'Tin tức đã được cập nhật!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
    
        $news->delete();
    
        return redirect()->route('admins.news.index')->with('success', 'Tin tức đã được xóa!');
    }
    
}
