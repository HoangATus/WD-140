<?php

namespace App\Http\Controllers;

use App\Models\Ordersuccess;
use App\Http\Requests\StoreOrdersuccessRequest;
use App\Http\Requests\UpdateOrdersuccessRequest;

class OrdersuccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.checkout.orderSuccess');
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
    public function store(StoreOrdersuccessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ordersuccess $ordersuccess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordersuccess $ordersuccess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdersuccessRequest $request, Ordersuccess $ordersuccess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordersuccess $ordersuccess)
    {
        //
    }
}
