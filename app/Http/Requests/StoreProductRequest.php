<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'product_code' => 'unique:products,product_code',
            'product_image_url' => 'nullable',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'variants' => 'required|array',
            // 'variants.*.attribute_size_name' => 'required|string',
            // 'variants.*.name' => 'required|string',
            'variants.*.quantity' => 'required|integer|min:0',
            'variants.*.variant_import_price' => 'required|numeric|min:0',
            'variants.*.variant_sale_price' => 'required|numeric|min:0',
            'variants.*.variant_listed_price' => 'required|numeric|min:0',
            'variants.*.image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //       
            'product_name.required' => 'Tên sản phẩm là bắt buộc.',
            'product_name.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'product_code.unique' => 'Mã sản phẩm đã tồn tại.',
            'description.required' => 'Mô tả bắt buộc phải nhập',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'variants.required' => 'Biến thể là bắt buộc.',
            // 'variants.*.attribute_size_name.required' => 'Kích thước là bắt buộc.',
            // 'variants.*.name.required' => 'Màu sắc là bắt buộc.',
            'variants.*.quantity.required' => 'Số lượng là bắt buộc.',
            'variants.*.quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
            'variants.*.variant_import_price.required' => 'Giá nhập là bắt buộc.',
            'variants.*.variant_sale_price.required' => 'Giá bán là bắt buộc.',
            'variants.*.variant_listed_price.required' => 'Giá niêm yết là bắt buộc.',
            'variants.*.image.image' => 'Tệp tải lên phải là một ảnh.',
            'variants.*.image.mimes' => 'Tệp phải có định dạng jpg, png, jpeg, gif hoặc svg.',
            'variants.*.image.max' => 'Ảnh không được vượt quá 2MB.',
        ];
    }
}
