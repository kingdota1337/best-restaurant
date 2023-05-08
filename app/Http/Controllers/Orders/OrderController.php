<?php

namespace App\Http\Controllers\Orders;

use App\Models\Orders\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Services\Orders\OrderService as Service;

class OrderController extends BaseController
{
    protected $service;

    public function __construct(Service $service)
    {
        parent::__construct($service);
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
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
