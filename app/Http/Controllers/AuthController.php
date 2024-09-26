<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showFormLogin() 
    {
        return view('auth.login');
    }

    public function login() {

    }

    public function showFormRegister() 
    {
        return view('auth.register');
    }

    public function register() {
        
    }
}
