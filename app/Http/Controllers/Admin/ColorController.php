<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Color;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    const PATH_VIEW = 'admins.colors.';
    const PATH_UPLOAD = 'colors';

    public function index()
    {
        $data = Color::query()->latest('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }

    public function create()
    {
        return view(self::PATH_VIEW.__FUNCTION__);
    }

    public function store(StoreColorRequest $request)
    {
        Color::query()->create([
            'name' => $request->name,
        ]);
        return redirect()->route('admins.colors.index')->with('success', ' Thêm mới thành công');
    }

    public function show(Color $color)
    {
        return view(self::PATH_VIEW.__FUNCTION__, compact('color'));
    }

    public function edit(Color $color)
    {
        if ($color->variants()->count() > 0) {
            return back()->with(['message' => 'Sửa thất bại. Do bản ghi đang được sử dụng.']);
        }
        return view(self::PATH_VIEW.__FUNCTION__, compact('color'));
    }

    public function update(UpdateColorRequest $request, Color $color)
    {
      $color->update([
        'name' => $request->name,
    ]);
    return redirect()->route('admins.colors.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy(Color $color)
    {
        if ($color->variants()->count() > 0) {
            return back()->with(['message' => 'Xóa thất bại. Do bản ghi đang được sử dụng.']);
        }
        $color->delete();
        return back()->with('success', 'Xóa thành công.');
    }
    
}