<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|unique:products,product_code',
            // 'product_image_url' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            //       
            'product_name.required' => 'Tên sản phẩm là bắt buộc.',
            'product_name.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            // 'product_image_url.image' => 'Tệp tải lên phải là một ảnh.',
        ];
    }
}
