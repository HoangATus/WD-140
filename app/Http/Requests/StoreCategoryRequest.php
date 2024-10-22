<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
       
            return [
                'name' => 'required|string|min:2|unique:categories,name', 
                'cover' => 'nullable|image|max:5048', 
            ];
        }
        
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục là bắt buộc.',
            'name.min' => 'Tên danh mục phải có ít nhất 2 ký tự.',
            'name.unique' => 'Tên danh mục đã tồn tại.',
            'cover.image' => 'Ảnh bìa phải là một tập tin hình ảnh.',
            'cover.max' => 'Ảnh bìa không được vượt quá 5MB.',
        ];
    }
    
}