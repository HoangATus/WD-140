<?php

namespace App\Http\Controllers\Clients; // Cập nhật namespace

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Đảm bảo rằng Controller được sử dụng đúng

class ProductController extends Controller
{
    // ... các phương thức ở đây ...
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.product');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('clients.productDetail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
