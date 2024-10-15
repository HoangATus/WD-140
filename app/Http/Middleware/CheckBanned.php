<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->is_banned) {
            Auth::logout();

            $message = 'Tài khoản của bạn đã bị cấm.';

            if ($user->banned_until) {
                $message .= ' Bạn bị cấm đến ' . $user->banned_until->format('d/m/Y H:i') . '.';
            }

            return redirect()->route('login')->withErrors(['email' => $message]);
        }

        return $next($request);
    }
}
