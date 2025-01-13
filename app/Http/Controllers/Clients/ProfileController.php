<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('clients.profile.index', compact('user'));
    }

    public function create()
    {
        //
    }

    public function store(StoreProfileRequest $request)
    {
        //
    }

    public function show(Profile $profile)
    {
        //
    }

    public function edit(Profile $user)
    {
        $user = Auth::user();
        return view('clients.profile.edit')->with('user', $user);
    }

    public function update(Request $request, $user_id)
    {
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255', 
            'user_email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|max:255|unique:users,user_email,' . $user_id . ',user_id', 
            'user_phone_number' => 'required|regex:/^0\d{9}$/|unique:users,user_phone_number,' . $user_id . ',user_id',
            'user_address' => 'required|string|max:500',
        ], [

            'user_name.required' => 'Họ và tên không được để trống.',
            'user_email.required' => 'Email không được để trống.',
            'user_email.email' => 'Email chưa đúng định dạng.',
            'user_email.regex' => 'Email phải có dấu "@" và tên miền hợp lệ.',
            'user_email.unique' => 'Email đã được sử dụng.',
            'user_phone_number.unique' => 'Số điện thoại đã được sử dụng.',
            'user_phone_number.required' => 'Số điện thoại không được để trống.',
            'user_phone_number.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có 10 chữ số.',
            'user_address.required' => 'Địa chỉ không được để trống.',
        ]);

        $user = User::findOrFail($user_id);

        $user->user_name = $request->user_name;
        $user->user_email = $request->user_email;
        $user->user_phone_number = $request->user_phone_number;
        $user->user_address = $request->user_address;
        $user->save();

        return redirect()->route('profile.index', $user->user_id)->with('successy', 'Cập nhật thông tin thành công');
    }

    public function destroy(Profile $profile)
    {
        //
    }
}
