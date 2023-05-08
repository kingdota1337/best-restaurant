<?php

namespace App\Services\Products;

use Inertia\Inertia;
use App\Models\Products\Product;

class ProductService
{
    /**
    * Display a listing of the resource.
    */
    public function index(): \Inertia\Response
    {
        $products = Product::all();
        
        return Inertia::render('Products/index', [
            'items' => $products,
        ]);
    }
}