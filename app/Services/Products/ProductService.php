<?php

namespace App\Services\Products;

use Inertia\Inertia;
use App\Services\BaseService;
use App\Models\Products\Product;

class ProductService extends BaseService
{
    public function __construct()
    {
        parent::__construct(model: new Product, path: 'Products');
    }
}