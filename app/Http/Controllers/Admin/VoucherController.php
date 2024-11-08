<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Http\Requests\VoucherRequest;
use App\Models\User;
use App\Models\Voucher;
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
            ->paginate($perPage)
            ->appends(['search' => $search, 'per_page' => $perPage]);
    
        return view('admins.vouchers.index', compact('vouchers', 'search', 'perPage'));
    }

    public function create()
    {
        return view('admins.vouchers.create');
    }

    public function store(StoreVoucherRequest $request)
    {

        Voucher::create($request->all());
        return redirect()->route('admins.vouchers.index')->with('success', 'Voucher đã được tạo thành công.');
    }

    public function edit(Voucher $voucher)
    {
        return view('admins.vouchers.edit', compact('voucher'));
    }

    public function update(UpdateVoucherRequest $request, $id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->update($request->all());
        return redirect()->route('admins.vouchers.index')->with('success', 'Voucher đã được cập nhật thành công.');
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('admins.vouchers.index')->with('success', 'Voucher đã được xóa thành công.');
    }
}
