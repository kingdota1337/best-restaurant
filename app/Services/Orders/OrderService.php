<?php

namespace App\Services\Orders;

use Inertia\Inertia;
use App\Models\Orders\Order;
use App\Services\BaseService;

class OrderService extends BaseService
{
    public function __construct()
    {
        parent::__construct(model: new Order, path: 'Orders');
    }   
}