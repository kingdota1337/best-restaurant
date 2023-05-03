<?php

namespace App\Services\Orders;

use Inertia\Inertia;
use App\Models\Orders\Order;

class OrderService
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $orders = Order::all();
        
        return Inertia::render('Orders/index', [
            'items' => $orders
         ]);
    }
}