<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admins.banners.';
    const PATH_UPLOAD = 'banners';
    public function index()
    {
        //
        $banners = Banner::query()->latest('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('banners'));

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
    

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return view(self::PATH_VIEW.__FUNCTION__, compact('banner'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view(self::PATH_VIEW.__FUNCTION__, compact('banner'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $data = $request->except('image');
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
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
        $banner->delete();
        return back()->with('message', 'Xóa thành công');
    }
}
