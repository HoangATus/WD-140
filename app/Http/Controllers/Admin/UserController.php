<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    const PATH_VIEW = 'admins.users.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
    
       
    
        return view(self::PATH_VIEW . 'index', compact('users'));
    }
    

    /**
     * Show the details of the specified resource.
     */
    public function show(User $user)
    { 
        if ($user->is_banned && $user->banned_until && now()->greaterThan($user->banned_until)) {
            $user->is_banned = false;
            $user->banned_until = null;
            $user->save();
        }
    
        return view('admins.users.show', compact('user'));
      
    }
    
    public function ban(Request $request, User $user)
    {
        if ($user->role === 'Admin') {
            return back()->with(['message' => 'Không thể cấm tài khoản quản trị viên.']);
        }
    
        $request->validate([
            'banned_until' => 'nullable|date', 
        ]);
    
        if ($request->banned_until && now()->greaterThan(now()->create($request->banned_until))) {
            $user->is_banned = false; 
            $user->banned_until = null; 
            $user->save();
    
            return redirect()->route('admins.users.index')->with('message', 'Tài khoản đang hoạt động bình thường vì ngày cấm bạn chọn đã qua.');
        }
    
        $user->is_banned = true;
        $user->banned_until = $request->banned_until ? now()->create($request->banned_until) : null; // Tạo thời gian cấm từ input
        $user->save();
    
        if ($request->banned_until) {
            return redirect()->route('admins.users.index')->with('message', 'Người dùng đã bị cấm thành công đến ' . $user->banned_until->format('d/m/Y H:i') . '.');
        }
    
        return redirect()->route('admins.users.index')->with('message', 'Người dùng đã bị cấm thành công.');
    }
    
    
    /**
     * Ban the specified user.
     */
   

    /**
     * Unban the specified user.
     */
    public function unban(User $user)
    {
        $user->is_banned = false;
        $user->banned_until = null;
        $user->save();

        return redirect()->route('admins.users.index')->with('message', 'Người dùng đã được gỡ cấm.');
    }
}
