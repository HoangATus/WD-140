<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Lấy thông tin người dùng đang đăng nhập
        return view('clients.profile.index', compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        $profile = Auth::user();
        // dd($profile);
        return view('clients.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        // $profile = Auth::user(); // Thông tin người dùng hiện tại
    
        // Cập nhật thông tin người dùng
        $request->update([
            'user_name' => $request->user_name,
            'user_phone_number' => $request->user_phone_number,
            'user_email' => $request->user_email,
            'user_address' => $request->user_address,
        ]);
    
        return redirect()->route('clients.profile.index')->with('success', 'Thông tin cá nhân đã được cập nhật.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
