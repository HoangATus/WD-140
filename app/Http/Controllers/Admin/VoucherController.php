<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Http\Requests\VoucherRequest;
use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');

        $perPage = $request->input('per_page', 10);

        $vouchers = Voucher::query()
            ->when($search, function ($query) use ($search) {
                $query->where('code', 'like', "%{$search}%")
                    ->orWhere('discount_type', 'like', "%{$search}%")
                    ->orWhere('is_active', 'like', "%{$search}%");
            })
            ->orderBy('is_active', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->appends(['search' => $search, 'per_page' => $perPage]);

        return view('admins.vouchers.index', compact('vouchers', 'search', 'perPage'));
    }

    public function create()
    {
        $users = User::all();

        return view('admins.vouchers.create', compact('users'));
    }

    // public function store(VoucherRequest $request)
    // {

    //     $voucher = Voucher::create();
    //     $voucher->users()->sync($request->user_ids); // Gán voucher cho khách hàng được chọn
    //     return redirect()->route('admins.vouchers.index')->with('success', 'Voucher đã được tạo thành công!');
    // }

    public function store(StoreVoucherRequest $request)
    {

        $validatedData = $request->validate([
            'code' => 'required|string|max:255',
            'discount_type' => 'required|string',
            'discount_value' => 'nullable|numeric',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'max_discount_amount' => 'nullable|numeric',
            'quantity' => 'nullable|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active' => 'boolean',
            'is_public' => 'boolean',
            'usage_type' => 'required|string',
            'min_order_amount' => 'nullable|numeric|min:0',
            'users' => 'nullable|array',
            'users.*' => 'exists:users,user_id'
        ]);

        $validatedData['end_date'] = Carbon::parse($request->end_date)->setTime(23, 58, 0);

        $voucher = Voucher::create($validatedData);

        if ($request->usage_type == 'restricted' && !empty($request->users)) {
            $voucher->users()->attach($request->users);
        }

        return redirect()->route('admins.vouchers.index')->with('success', 'Voucher được tạo thành công!');
    }




    public function show($id)
    {
        $voucher = Voucher::findOrFail($id);
        $users = User::all();
        $selectedUsers = $voucher->users->pluck('user_id')->toArray();

        return view('admins.vouchers.show', compact('voucher', 'users', 'selectedUsers'));
    }

    // public function store(StoreVoucherRequest $request)
    // {

    //     Voucher::create($request->all());
    //     return redirect()->route('admins.vouchers.index')->with('success', 'Voucher đã được tạo thành công.');
    // }

    public function edit(Voucher $voucher)
    {
        $selectedUsers = $voucher->users->pluck('user_id')->toArray();
        $users = User::all();
        return view('admins.vouchers.edit', compact('voucher', 'users', 'selectedUsers'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:255|unique:vouchers,code,' . $voucher->id,
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'discount_type' => 'required|in:fixed,percent',
            'discount_value' => 'required_if:discount_type,fixed|nullable|numeric|min:0',
            'discount_percent' => 'required_if:discount_type,percent|nullable|numeric|min:1|max:100',
            'max_discount_amount' => 'required_if:discount_type,percent|nullable|numeric|min:0',
            'min_order_amount' => 'required_if:discount_type,fixed|nullable|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'is_public' => 'required|boolean',
            'is_active' => 'required|boolean',
            'usage_type' => 'required|in:all,restricted',
            'users' => 'required_if:usage_type,restricted|array',
            'users.*' => 'exists:users,user_id',
        ], [
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
            'discount_percent.min' => 'Giảm giá phần trăm phải lớn hơn hoặc bằng 1%.',
            'discount_percent.max' => 'Giảm giá phần trăm không được vượt quá 100%.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $endDate = $request->end_date
            ? Carbon::parse($request->end_date)->setTime(23, 58, 0)
            : null;

        $voucher->update([
            'code' => $request->code,
            'discount_type' => $request->discount_type,
            'discount_value' => $request->discount_value,
            'discount_percent' => $request->discount_percent,
            'max_discount_amount' => $request->max_discount_amount,
            'quantity' => $request->quantity,
            'start_date' => $request->start_date,
            'end_date' => $endDate,
            'is_active' => $request->is_active,
            'is_public' => $request->is_public,
            'usage_type' => $request->usage_type,
            'min_order_amount' => $request->min_order_amount
        ]);

        if ($request->usage_type == 'restricted') {
            $voucher->users()->sync($request->users); 
        } else {
            $voucher->users()->detach(); 
        }

        return redirect()->route('admins.vouchers.index')->with('success', 'Voucher đã được cập nhật thành công!');
    }



    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('admins.vouchers.index')->with('success', 'Voucher đã được xóa thành công.');
    }
}
