<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $bannersId = $this->route('banner') ? $this->route('banner')->id : null;

        return [
            'title' => 'required|string|max:255|unique:banners,title,' . $bannersId,
            'image' => 'nullable|image|max:5048', 
            'category_id' => 'required',
            'description' => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được bỏ trống.',
            'title.unique' => 'Tên Tiêu đề đã tồn tại.',
            'image.image' => 'File tải lên phải là một hình ảnh.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'description.max' => 'Mô tả không được vượt quá 500 ký tự.',
        ];
    }
}
