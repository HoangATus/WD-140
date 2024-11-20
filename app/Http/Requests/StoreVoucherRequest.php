<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoucherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required|string|max:255',
            'discount_type' => 'required|string',
            'discount_value' => 'required|nullable|numeric',
            'discount_percent' => 'required|nullable|numeric|min:0|max:100',
            'max_discount_amount' => 'required|nullable|numeric',
            'quantity' => 'required|nullable|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'min_order_amount' => 'required|nullable|numeric|min:0',
            'users' => 'required_if:usage_type,restricted|array|min:1',
            'users.*' => 'exists:users,user_id',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Mã voucher là bắt buộc.',
            'code.string' => 'Mã voucher phải là chuỗi ký tự.',
            'code.max' => 'Mã voucher không được vượt quá :max ký tự.',
            'discount_type.required' => 'Loại giảm giá là bắt buộc.',
            'discount_value.numeric' => 'Giá trị giảm giá phải là số.',
            'discount_value.required' => 'Giá trị giảm là bắt buộc.',
            'discount_percent.numeric' => 'Phần trăm giảm giá phải là số.',
            'discount_percent.min' => 'Phần trăm giảm giá không được nhỏ hơn :min.',
            'discount_percent.max' => 'Phần trăm giảm giá không được lớn hơn :max.',
            'max_discount_amount.numeric' => 'Số tiền giảm giá tối đa phải là số.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng không được nhỏ hơn :min.',
            'quantity.required' => 'Số lượng là băt buộc',
            'start_date.required' => 'Ngày bắt đầu là bắt buộc.',
            'start_date.date' => 'Ngày bắt đầu phải là định dạng ngày hợp lệ.',
            'end_date.required' => 'Ngày kết thúc là bắt buộc.',
            'end_date.date' => 'Ngày kết thúc phải là định dạng ngày hợp lệ.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            'min_order_amount.numeric' => 'Số tiền đơn hàng tối thiểu phải là số.',
            'min_order_amount.required' => 'Số tiền đơn hàng tối thiểu là bắt buộc.',
            'users.required_if' => 'Vui lòng chọn ít nhất một người dùng khi phạm vi sử dụng là "Giới hạn".',
            'users.min' => 'Cần chọn ít nhất một người dùng.',
            'users.*.exists' => 'Một hoặc nhiều người dùng không tồn tại trong hệ thống.',
        ];
    }
}
