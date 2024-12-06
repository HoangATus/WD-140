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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
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
    public function edit(Profile $user)
    {
        $user = Auth::user();
        return view('clients.profile.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email',
            'user_phone_number' => 'required|string|digits:10',
            'user_address' => 'required|string|max:255',
        ]);
    
        $user = User::findOrFail($user_id);
 
        $user->user_name = $request->user_name;
        $user->user_email = $request->user_email;
        $user->user_phone_number = $request->user_phone_number;
        $user->user_address = $request->user_address;
        $user->save();
    
        return redirect()->route('profile.index', $user->user_id)->with('successy', 'Cập nhật thông tin thành công');
    }
    
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
