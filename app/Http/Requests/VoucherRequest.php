<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest
{
    public function rules()
    {
        return [
            'code' => 'required|string|max:255|unique:vouchers,code',
            'quantity' => 'required|integer|min:1',
            'discount_type' => 'required|in:fixed,percent',
            'discount_value' => 'required_if:discount_type,fixed|integer|min:0',
            'discount_percent' => 'required_if:discount_type,percent|numeric|min:0|max:100',
            'max_discount_amount' => 'nullable|integer|min:0',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'required|boolean',
            'is_public' => 'required|boolean',
            'user_ids' => 'nullable|array',
            'user_ids.*' => 'exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Mã Voucher là bắt buộc.',
            'code.unique' => 'Mã Voucher đã tồn tại.',
            'quantity.required' => 'Số lượng Voucher là bắt buộc.',
            'discount_value.required_if' => 'Giảm Giá Mệnh Giá là bắt buộc nếu loại giảm giá là Mệnh Giá.',
            'discount_percent.required_if' => '% Giảm Giá là bắt buộc nếu loại giảm giá là %.',
            'start_date.required' => 'Ngày Bắt Đầu là bắt buộc.',
            'end_date.required' => 'Ngày Kết Thúc là bắt buộc.',
            'end_date.after' => 'Ngày Kết Thúc phải sau Ngày Bắt Đầu.',
        ];
    }
}
