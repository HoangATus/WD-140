<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateColorRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:255|unique:colors,name',
            // 'quantity' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên màu là bắt buộc.',
            'name.min' => 'Tên màu phải có ít nhất 2 ký tự.',
            'name.unique' => 'Tên màu đã tồn tại',
            // 'quantity.required' => 'Số lượng sản phẩm là bắt buộc.',
            // 'quantity.numeric' => 'Số lượng phải là số.',
            // 'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
        ];
    }

}
