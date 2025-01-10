<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Models\AttributeSize;
use App\Models\OrderItem;
use Illuminate\Http\Request;


class SizeController extends Controller
{
    const PATH_VIEW = 'admins.attributeSizes.';
    const PATH_UPLOAD = 'attributeSizes';
    public function index()
    {
        $attributeSizes = AttributeSize::query()->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('attributeSizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSizeRequest $request)
    {

        AttributeSize::query()->create([
            'attribute_size_name' => $request->attribute_size_name,
        ]);
        return redirect()->route('admins.attributeSizes.index')->with('success', ' Thêm mới thành công');
    }


    /**
     * Display the specified resource.
     */
    public function show(AttributeSize $attributeSize)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('attributeSize'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttributeSize $attributeSize)
    {
        // Kiểm tra nếu size đã được sử dụng làm biến thể
        if ($attributeSize->variants()->exists()) {
            return redirect()->route('admins.attributeSizes.index')
                ->with('error', 'Sửa thất bại. Do bản ghi đang được sử dụng.');
        }

        return view(self::PATH_VIEW . __FUNCTION__, compact('attributeSize'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, AttributeSize $attributeSize)
    {

        $attributeSize->update([
            'attribute_size_name' => $request->attribute_size_name,
        ]);
        return redirect()->route('admins.attributeSizes.index')->with('message', 'Cập nhật thành công');
    }


    public function destroy(AttributeSize $attributeSize)
    {
        $isUsedAsVariant = $attributeSize->variants()->exists();

        if ($isUsedAsVariant) {
            return back()->with('error', 'Xóa thất bại. Do bản ghi đang được sử dụng.');
        }

        $attributeSize->delete();
        return back()->with('message', 'Xóa thành công');
    }
}