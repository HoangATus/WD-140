<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    // use SendsPasswordResetEmails;

    /**
     * Hiển thị form nhập email.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.clients.forgotPassword');
    }

    /**
     * Gửi email với link reset mật khẩu.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,user_email',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.exists' => 'Email không tồn tại trong hệ thống.'
        ]);

        $existingToken = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        $token = Str::random(5);
        $expiresAt = now()->addMinutes(5); 

        if ($existingToken) {
            $requestCount = $existingToken->request_count;

            if ($requestCount >= 3) {
                $timeSinceLastRequest = now()->diffInMinutes($existingToken->created_at);

                if ($timeSinceLastRequest < 5) {
                    return back()->withErrors(['email' => 'Bạn đã gửi yêu cầu nhiều lần, để đặt lại mật khẩu chờ sau 5 phút.']);
                }
            }

            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->update([
                    'token' => $token,
                    'created_at' => now(),
                    'expires_at' => $expiresAt,
                    'request_count' => $requestCount + 1
                ]);
        } else {
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
                'expires_at' => $expiresAt,
                'request_count' => 1
            ]);
        }

        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return back()->with('status', 'Mã reset mật khẩu đã được gửi đến email của bạn.');
    }




    public function showResetForm($token)
    {
        return view('auth.clients.reset-password', ['token' => $token]);
    }


    public function reset(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'token' => 'required'
            ],
            [
                'email.required' => 'Vui lòng nhập địa chỉ email.',
                'email.email' => 'Địa chỉ email không hợp lệ.',
                'password.required' => 'Vui lòng nhập mật khẩu.',
                'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
                'token.required' => 'Mã xác thực không hợp lệ.'
            ]
        );


        $resetRecord = DB::table('password_reset_tokens')->where('token', $request->token)->first();

        if (!$resetRecord || $resetRecord->email != $request->email) {

            return back()->withErrors(['email' => 'Mã xác thực không hợp lệ hoặc không khớp với email.']);
        }

        if (now()->greaterThan($resetRecord->expires_at)) {
            return back()->withErrors(['email' => 'Mã xác thực đã hết hạn. Vui lòng yêu cầu mã mới.']);
        }


        $user = User::where('user_email', $request->email)->first();

        if (!$user) {

            return back()->withErrors(['email' => 'Email không tồn tại trong hệ thống.']);
        }


        $user->user_password = bcrypt($request->password);
        $user->save();


        DB::table('password_reset_tokens')->where('email', $request->email)->delete();


        return redirect()->route('login')->with('status', 'Mật khẩu đã được cập nhật thành công!');
    }
}
