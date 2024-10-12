<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {

       // return view('admins.orders.index');
    }
    public function show()
    {
        return view('admins.orders.show');
    }
}
