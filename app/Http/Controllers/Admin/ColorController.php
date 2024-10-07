<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Color;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;

class ColorController extends Controller
{
    const PATH_VIEW = 'admins.colors.';
    const PATH_UPLOAD = 'colors';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Color::query()->latest('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
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
    public function store(StoreColorRequest $request)
    {
        Color::query()->create([
            'name' => $request->name,
        ]);
        return redirect()->route('admins.colors.index')->with('success', ' Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        return view(self::PATH_VIEW.__FUNCTION__, compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view(self::PATH_VIEW.__FUNCTION__, compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColorRequest $request, Color $color)
    {
      $color->update([
        'name' => $request->name,
    ]);
    return redirect()->route('admins.colors.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return back()->with('success', 'Xóa thành công');
    }
}
