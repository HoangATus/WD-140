<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.clients.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login_identifier' => 'required|string',
            'user_password' => 'required|string',
        ]);

        $field = filter_var($request->login_identifier, FILTER_VALIDATE_EMAIL) ? 'user_email' : 'user_phone_number';
        $user = User::where($field, $request->login_identifier)->first();

        if ($user && Hash::check($request->user_password, $user->user_password)) {
            Auth::login($user); 
            return redirect('/'); 
        }

        // Đăng nhập thất bại
        return back()->withErrors(['loginError' => 'Thông tin đăng nhập không đúng']);
    }



    public function showFormRegister()
    {
        return view('auth.clients.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'nullable|email|max:255|unique:users,user_email',
            'user_phone_number' => 'nullable|regex:/^[0-9]{10,15}$/|unique:users,user_phone_number',
            'user_password' => 'required|string|confirmed|min:8',
        ], [
            'user_email.unique' => 'Email đã được sử dụng.',
            'user_phone_number.unique' => 'Số điện thoại đã được sử dụng.',
            'user_phone_number.regex' => 'Số điện thoại không hợp lệ.',
            'user_contact.required' => 'Vui lòng nhập Email hoặc Số điện thoại.',
        ]);


        if (!$request->filled('user_email') && !$request->filled('user_phone_number')) {
            return back()->withErrors(['user_contact' => 'Vui lòng nhập Email hoặc Số điện thoại.'])->withInput();
        }


        $user = User::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_phone_number' => $request->user_phone_number,
            'user_password' => Hash::make($request->user_password),
            'user_address' => 'hanoi',
            'role' => User::ROLE_USER,
        ]);


        Auth::login($user);

        return redirect('/');
    }

    public function showformRequest()
    {
        return view('auth.clients.forgotPassword');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // admin

    public function showFormLoginAdmin()
    {
        return view('auth.admins.login');
    }

    public function loginAdmin(Request $request)
    {
        $user = $request->validate([
            'user_email' => 'required|string|email|max:255',
            'user_password' => 'required|string'
        ], [
            'user_email.required' => 'Vui lòng điền vào mục này.',
            'user_email.email' => 'Email không hợp lệ.',
            'user_password.required' => 'Vui lòng điền vào mục này.'
        ]);

        $userRecord = User::where('user_email', $user['user_email'])->first();

        if (!$userRecord) {
            return back()->withErrors([
                'loginError' => 'Lỗi rồi! Tài khoản admin không tồn tại. Vui lòng kiểm tra lại email hoặc liên hệ với quản trị viên.',
            ])->onlyInput('user_email');
        }

        if (Hash::check($user['user_password'], $userRecord->user_password)) {
            Auth::login($userRecord, $request->remember);
            return redirect()->intended('/admin/danhmucs');
        }

        return back()->withErrors([
            'loginError' => 'Lỗi rồi! Mật khẩu bạn vừa nhập không chính xác, bạn vui lòng kiểm tra lại mật khẩu của mình. ',
        ])->onlyInput('user_email');
    }

    public function logoutAdmin()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}