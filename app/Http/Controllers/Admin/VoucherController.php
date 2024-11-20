<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Http\Requests\VoucherRequest;
use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
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
                    ->orWhere('type', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
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

    public function store(Request $request)
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
        $endDate = $request->end_date
            ? \Carbon\Carbon::parse($request->end_date)->setTime(23, 58, 0)
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
