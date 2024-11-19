<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::latest()->paginate(10);
        return view('admins.news_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admins.news_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:news_categories|max:255',
        ], [
            'name.required' => 'Tên danh mục là bắt buộc.',
            'name.unique' => 'Tên danh mục này đã tồn tại, vui lòng nhập Tên danh mục khác.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
           
        ]);
        NewsCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admins.news_categories.index')->with('success', 'Danh mục đã được thêm!');
    }

    public function edit($id)
    {
        $category = NewsCategory::findOrFail($id);
        return view('admins.news_categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = NewsCategory::findOrFail($id);
    
        $request->validate([
            'name' => 'required|max:255|unique:news_categories,name,' . $category->id,
        ], [
            'name.required' => 'Tên danh mục là bắt buộc.',
            'name.unique' => 'Tên danh mục này đã tồn tại, vui lòng nhập Tên danh mục khác.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
        ]);
    
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
    
        return redirect()->route('admins.news_categories.index')->with('success', 'Danh mục đã được cập nhật!');
    }
    public function destroy($id)
    {
        $category = NewsCategory::findOrFail($id);
    
        if ($category->news()->exists()) {
            return redirect()->route('admins.news_categories.index')
                ->with('message', 'Không thể xóa danh mục đã được sử dụng trong bảng tin tức.');
        }
    
        $category->delete();
    
        return redirect()->route('admins.news_categories.index')->with('success', 'Danh mục đã được xóa!');
    }
        
}
