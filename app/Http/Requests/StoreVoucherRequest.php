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
            'code' => 'required|string|max:20|unique:vouchers,code',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|in:amount,percentage',
            'discount_amount' => 'nullable|required_if:type,amount|numeric|min:1',
            'discount_percentage' => 'nullable|required_if:type,percentage|numeric|min:1|max:100',
            'max_discount' => 'nullable|required_if:type,percentage|numeric|min:1',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|boolean',
            'usage_type' => 'required|in:all,restricted'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Mã voucher là bắt buộc.',
            'code.max' => 'Mã voucher không được vượt quá 20 ký tự.',
            'code.unique' => 'Mã voucher này đã tồn tại.',
            'start_date.required' => 'Ngày bắt đầu là bắt buộc.',
            'start_date.before_or_equal' => 'Ngày bắt đầu phải nhỏ hơn hoặc bằng ngày kết thúc.',
            'end_date.required' => 'Ngày kết thúc là bắt buộc.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải lớn hơn hoặc bằng ngày bắt đầu.',
            'type.required' => 'Loại giảm giá là bắt buộc.',
            'type.in' => 'Loại giảm giá không hợp lệ.',
            'discount_amount.required_if' => 'Mệnh giá giảm giá là bắt buộc nếu chọn loại mệnh giá.',
            'discount_amount.numeric' => 'Mệnh giá phải là số.',
            'discount_amount.min' => 'Mệnh giá giảm giá phải lớn hơn 0.',
            'discount_percentage.required_if' => 'Phần trăm giảm giá là bắt buộc nếu chọn loại phần trăm.',
            'discount_percentage.numeric' => 'Phần trăm giảm giá phải là số.',
            'discount_percentage.min' => 'Phần trăm giảm giá phải lớn hơn 0.',
            'discount_percentage.max' => 'Phần trăm giảm giá không thể vượt quá 100%.',
            'max_discount.required_if' => 'Giới hạn tối đa giảm giá là bắt buộc khi giảm theo %.',
            'quantity.required' => 'Số lượng voucher là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng phải ít nhất là 1.',
            'status.required' => 'Trạng thái là bắt buộc.',
            'status.boolean' => 'Trạng thái không hợp lệ.',
            'usage_type.required' => 'Phạm vi sử dụng là bắt buộc.',
            'usage_type.in' => 'Phạm vi sử dụng không hợp lệ.',
        ];
    }
}
