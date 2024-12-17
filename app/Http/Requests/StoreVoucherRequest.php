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
            'code' => 'required|string|max:255|unique:vouchers,code',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'discount_type' => 'required|in:fixed,percent',
            'discount_value' => 'required_if:discount_type,fixed|nullable|numeric|min:0',
            'discount_percent' => 'required_if:discount_type,percent|nullable|numeric|min:1|max:100',
            'max_discount_amount' => 'required_if:discount_type,percent|nullable|numeric|min:0',
            'min_order_amount' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'is_public' => 'required|boolean',
            'is_active' => 'required|boolean',
            'usage_type' => 'required|in:all,restricted',
            'users' => 'required_if:usage_type,restricted|array',
            'users.*' => 'exists:users,user_id',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Mã voucher không được để trống.',
            'code.string' => 'Mã voucher phải là chuỗi ký tự.',
            'code.max' => 'Mã voucher không được dài quá 255 ký tự.',
            'code.unique' => 'Mã voucher đã tồn tại, vui lòng chọn mã khác.',
            'start_date.required' => 'Ngày bắt đầu không được để trống.',
            'start_date.date' => 'Ngày bắt đầu phải là một ngày hợp lệ.',
            'start_date.before_or_equal' => 'Ngày bắt đầu phải trước hoặc bằng ngày kết thúc.',
            'end_date.required' => 'Ngày kết thúc không được để trống.',
            'end_date.date' => 'Ngày kết thúc phải là một ngày hợp lệ.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            'discount_type.required' => 'Loại giảm giá không được để trống.',
            'discount_type.in' => 'Loại giảm giá phải là mệnh giá (fixed) hoặc phần trăm (percent).',
            'discount_value.required_if' => 'Mệnh giá giảm giá là bắt buộc khi loại giảm giá là mệnh giá.',
            'discount_value.numeric' => 'Mệnh giá giảm giá phải là số.',
            'discount_value.min' => 'Mệnh giá giảm giá phải lớn hơn hoặc bằng 0.',
            'discount_percent.required_if' => 'Phần trăm giảm giá là bắt buộc khi loại giảm giá là phần trăm.',
            'discount_percent.numeric' => 'Phần trăm giảm giá phải là số.',
            'discount_percent.min' => 'Phần trăm giảm giá phải lớn hơn hoặc bằng 1.',
            'discount_percent.max' => 'Phần trăm giảm giá không được vượt quá 100.',
            'max_discount_amount.required_if' => 'Tối đa giảm giá là bắt buộc khi loại giảm giá là phần trăm.',
            'max_discount_amount.numeric' => 'Tối đa giảm giá phải là số.',
            'max_discount_amount.min' => 'Tối đa giảm giá phải lớn hơn hoặc bằng 0.',
            'min_order_amount.required' => 'Giá tối thiểu được giảm không được để trống.',
            'min_order_amount.numeric' => 'Giá tối thiểu được giảm phải là số.',
            'min_order_amount.min' => 'Giá tối thiểu được giảm phải lớn hơn hoặc bằng 0.',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
            'is_public.required' => 'Trạng thái công khai không được để trống.',
            'is_public.boolean' => 'Trạng thái công khai phải là giá trị đúng hoặc sai.',
            'is_active.required' => 'Trạng thái hoạt động không được để trống.',
            'is_active.boolean' => 'Trạng thái hoạt động phải là giá trị đúng hoặc sai.',
            'usage_type.required' => 'Phạm vi sử dụng không được để trống.',
            'usage_type.in' => 'Phạm vi sử dụng phải là mọi người (all) hoặc giới hạn (restricted).',
            'users.required_if' => 'Danh sách người dùng là bắt buộc khi phạm vi sử dụng là giới hạn.',
            'users.array' => 'Danh sách người dùng phải là một mảng.',
            'users.*.exists' => 'Người dùng được chọn không tồn tại.',
        ];
    }
}
