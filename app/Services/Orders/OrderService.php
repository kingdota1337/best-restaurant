<?php

namespace App\Service\Orders;

use Inertia\Inertia;

class OrderService
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Orders/index');
    }
}