<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_email' => 'required|email|max:255|unique:users,user_email',
            'user_name' => 'required|string|min:3|max:50|regex:/^(?!.*\s\s)(?!\s)[\p{L}\d\s\-]*(?<!\s)$/u|unique:users,user_name',
            'user_password' => 'required|string|min:8|confirmed'
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'user_name.required' => 'Vui lòng nhập tên người dùng.',
            'user_name.min' => 'Tên phải có ít nhất 3 ký tự.',
            'user_name.max' => 'Tên không được vượt quá 50 ký tự.',
            'user_name.regex' => 'Tên chỉ được chứa chữ cái, số và dấu gạch ngang.',
            'user_name.unique' => 'Tên người dùng này đã tồn tại, vui lòng chọn tên khác.',
            'user_email.required' => 'Email là bắt buộc.',
            'user_email.email' => 'Email không hợp lệ, vui lòng kiểm tra lại.',
            'user_email.unique' => 'Email đã tồn tại trong hệ thống, vui lòng sử dụng email khác.',
            'user_password.required' => 'Mật khẩu không được bỏ trống.',
            'user_password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'user_password.confirmed' => 'Mật khẩu không khớp, vui lòng nhập lại'
        ];
    }
}
