<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVoucherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required|string|max:20|unique:vouchers,code,' . $this->route('voucher'),
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
        return (new StoreVoucherRequest())->messages();
    }
}
