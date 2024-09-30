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
                'loginError' => 'Lỗi rồi! Tài khoản không tồn tại, bạn cần kiểm tra lại thông tin tài khoản của mình. Nếu bạn chưa có tài khoản, hãy <a href="' . route('register') . '">bấm vào đây để Đăng Ký</a>! Xin cảm ơn!',
            ])->onlyInput('user_email');
        }

        if (Hash::check($user['user_password'], $userRecord->user_password)) {
            Auth::login($userRecord);
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'loginError' => 'Lỗi rồi! Mật khẩu bạn vừa nhập không chính xác, bạn vui lòng kiểm tra lại mật khẩu của mình. Nếu bạn quên mật khẩu hãy bấm vào <a href="' . route('password.request') . '">Quên mật khẩu?</a> để đặt lại mật khẩu mới! Xin cảm ơn!',
        ])->onlyInput('user_email');
    }

    public function showFormRegister()
    {
        return view('auth.clients.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::query()->create($data);
        Auth::login($user);
        return redirect()->intended('/');
    }

    public function showformRequest() {
        return view('auth.clients.forgotPassword');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    // admin

    public function showFormLoginAdmin() {
        return view('auth.admins.login');
    }

    public function loginAdmin(Request $request) {
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

    public function logoutAdmin() {
        Auth::logout();
        return redirect()->route('admin.login');
    }


}
