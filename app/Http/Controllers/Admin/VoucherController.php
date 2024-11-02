<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherRequest;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        return view('admins.vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        $users = User::all(); // Lấy danh sách khách hàng
        return view('admins.vouchers.create', compact('users'));
    }

    public function store(VoucherRequest $request)
    {
       
        $voucher = Voucher::create();
        $voucher->users()->sync($request->user_ids); // Gán voucher cho khách hàng được chọn
        return redirect()->route('admins.vouchers.index')->with('success', 'Voucher đã được tạo thành công!');
    }

    public function show($id)
    {
        $users = User::all(); // Lấy danh sách khách hàng

        $voucher = Voucher::with('users')->findOrFail($id);
        return view('admins.vouchers.show', compact('voucher', 'users'));
    }


    public function edit($id)
    {
        $voucher = Voucher::findOrFail($id);
        $users = User::all();
        return view('admins.vouchers.edit', compact('voucher', 'users'));
    }

    public function update(VoucherRequest $request, $id)
    {
        $validated = $request->validate([
            'code' => 'required|unique:vouchers,code,' . $id,
            'discount_percent' => 'required|numeric|min:1|max:100',
            'max_discount_amount' => 'nullable|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_public' => 'required|boolean',
            'is_active' => 'required|boolean', // Thêm yêu cầu xác thực cho is_active
            'user_ids' => 'nullable|array',
        ]);

        $voucher = Voucher::findOrFail($id);
        $voucher->update($validated);
        $voucher->users()->sync($request->user_ids);

        return redirect()->route('admins.vouchers.index')->with('success', 'Voucher đã được cập nhật thành công!');
    }

    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();
        return redirect()->route('admins.vouchers.index')->with('success', 'Voucher đã được xóa thành công!');
    }
}
