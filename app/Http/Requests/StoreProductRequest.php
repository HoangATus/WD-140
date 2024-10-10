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
            'product_name' => 'required|string|max:255|unique:products,product_name',
            'product_code' => 'unique:products,product_code',
            'product_image_url' => 'nullable',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'variants' => 'required|array',
            'variants.*.attribute_size_name' => ['required', Rule::exists('attribute_sizes', 'id')],
            'variants.*.name' => ['required', Rule::exists('colors', 'id')],
            'variants.*.quantity' => 'required|integer|min:0',
            'variants.*.variant_import_price' => 'required|numeric|min:0',
            'variants.*.variant_sale_price' => 'required|numeric|min:0',
            'variants.*.variant_listed_price' => 'required|numeric|min:0',
            'variants.*.image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5048',
            'description' => 'required',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $variants = $this->variants;
            $sizeColorPairs = [];

            foreach ($variants as $index => $variant) {
                $sizeId = $variant['attribute_size_name'];
                $colorId = $variant['name'];

                // Kiểm tra xem cặp kích thước và màu sắc đã tồn tại chưa
                if (in_array([$sizeId, $colorId], $sizeColorPairs)) {
                    $validator->errors()->add("variants.$index", 'Kết hợp kích thước và màu sắc không được trùng lặp.');
                } else {
                    $sizeColorPairs[] = [$sizeId, $colorId];
                }
            }

            foreach ($this->input('variants') as $index => $variant) {
                $importPrice = $variant['variant_import_price'];
                $salePrice = $variant['variant_sale_price'];
                $listedPrice = $variant['variant_listed_price'];
                if ($salePrice < $importPrice) {
                    $validator->errors()->add("variants.$index.variant_sale_price", 'Giá bán phải lớn hơn hoặc bằng giá nhập.');
                }
                if ($listedPrice < $salePrice) {
                    $validator->errors()->add("variants.$index.variant_listed_price", 'Giá niêm yết phải lớn hơn hoặc bằng giá bán.');
                }
            }
        });
    }

    public function messages()
    {
        return [
            //       
            'product_name.required' => 'Tên sản phẩm là bắt buộc.',
            'product_name.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'product_name.unique' => 'Tên đã tồn tại',
            'product_code.unique' => 'Mã sản phẩm đã tồn tại.',
            'description.required' => 'Mô tả bắt buộc phải nhập',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Vui lòng chọn danh mục',
            'variants.required' => 'Biến thể là bắt buộc.',
            'variants.*.attribute_size_name.required' => 'Kích thước là bắt buộc.',
            'variants.*.attribute_size_name.exists' => 'Vui lòng chọn size',
            'variants.*.name.required' => 'Màu sắc là bắt buộc.',
            'variants.*.name.exists' => 'Vui lòng chọn màu',
            'variants.*.quantity.required' => 'Số lượng là bắt buộc.',
            'variants.*.quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
            'variants.*.variant_import_price.required' => 'Giá nhập là bắt buộc.',
            'variants.*.variant_sale_price.required' => 'Giá bán là bắt buộc.',
            'variants.*.variant_listed_price.required' => 'Giá niêm yết là bắt buộc.',
            'variants.*.image.image' => 'Tệp tải lên phải là một ảnh.',
            'variants.*.image.required' => 'Ảnh không được để trống',
            'variants.*.image.mimes' => 'Tệp phải có định dạng jpg, png, jpeg, gif hoặc svg.',
            'variants.*.image.max' => 'Ảnh không được vượt quá 5MB.',
        ];
    }
}
