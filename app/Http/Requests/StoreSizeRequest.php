<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSizeRequest extends FormRequest
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
            'attribute_size_name' => 'required|string|max:255|unique:attribute_sizes,attribute_size_name',


        ];
    }
    public function messages()
    {
        return [
            'attribute_size_name.required' => 'Tên size không được bỏ trống.',
            'attribute_size_name.unique' => 'Tên size đã tồn tại',

        ];
    }
}