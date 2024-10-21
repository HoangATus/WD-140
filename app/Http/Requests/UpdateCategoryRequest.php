<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        // Lấy ID của danh mục hiện tại từ route
        $categoryId = $this->route('category') ? $this->route('category')->id : null;

        return [
            'name' => 'required|string|min:2|unique:categories,name,' . $categoryId, 
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5048', 
        ];
    }

    /**
     * Custom messages for validation.
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục là bắt buộc.',
            'name.min' => 'Tên danh mục phải có ít nhất 2 ký tự.',
            'name.unique' => 'Tên danh mục đã tồn tại.',
            'cover.image' => 'Ảnh bìa phải là một tập tin hình ảnh.',
            'cover.mimes' => 'Ảnh bìa phải có định dạng jpeg, png, jpg, hoặc gif.',
            'cover.max' => 'Ảnh bìa không được vượt quá 5MB.',
        ];
    }
}
