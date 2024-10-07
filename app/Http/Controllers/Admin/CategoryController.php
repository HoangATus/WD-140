<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    const PATH_VIEW = 'admins.categories.';
    const PATH_UPLOAD = 'categories';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::query()->latest('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->except('cover');
    
    
        $data['slug'] = $data['slug'] ?? Str::slug($request->name);
    
        if ($request->hasFile('cover')) {
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        } else {
            $data['cover'] = '';  
        }
    
        Category::query()->create($data);
    
        return redirect()->route('admins.categories.index')->with('message', 'Thêm mới thành công');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view(self::PATH_VIEW.__FUNCTION__, compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view(self::PATH_VIEW.__FUNCTION__, compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->except('cover');
        if ($request->hasFile('cover')) {
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
            if (!empty($category->cover) && Storage::exists($category->cover)) {
                Storage::delete($category->cover);
            }
        } else {
            $data['cover'] = $category->cover;
        }
        $category->update($data);
        return redirect()->route('admins.categories.index')->with('message', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->product()->count() > 0) {
            return back()->with(['message' => 'Không thể xóa danh mục này vì nó đã được liên kết với sản phẩm.']);
        }
        $category->delete();
        return back()->with('message', 'Xóa thành công');
    }
}
