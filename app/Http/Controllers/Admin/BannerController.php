<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    const PATH_VIEW = 'admins.banners.';
    const PATH_UPLOAD = 'banners';
    public function index()
    {
        //
        $banners = Banner::query()->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('banners'));
    }
    public function create()
    {
        $categories = Category::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories'));
    }
    public function store(StoreBannerRequest $request)
    {
        $data = $request->except('image');

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
        } else {
            $data['image'] = '';
        }

        Banner::query()->create($data);

        return redirect()->route('admins.banners.index')->with('message', 'Thêm mới thành công');
    }
    public function show(Banner $banner)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('banner'));
    }
    public function edit(Banner $banner)
    {
        $categories = Category::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('banner', 'categories'));
    }


    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $data = $request->except('image');
        $activeBannersCount = Banner::where('is_active', 1)->count();
        if ($activeBannersCount == 1 && $request->is_active == 0 && $banner->is_active == 1) {
            return redirect()->route('admins.banners.index')->with('success', 'Không thể tắt banner này vì đây là banner hoạt động duy nhất.');
        }
        $data['is_active'] ??= 0;
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
            if (!empty($banner->image) && Storage::exists($banner->image)) {
                Storage::delete($banner->image);
            }
        } else {
            $data['image'] = $banner->image;
        }
        $banner->update($data);
        return redirect()->route('admins.banners.index')->with('message', 'Cập nhật thành công');
    }


 
    public function destroy(Banner $banner)
    {
        $activeBannersCount = Banner::where('is_active', 1)->count();
        if ($activeBannersCount == 1 && $banner->is_active == 1) {
            return redirect()->back()->with('success', 'Không thể xóa banner này vì đây là banner hoạt động duy nhất.');
        }
        $banner->delete();
        return back()->with('message', 'Xóa thành công');
    }
}
