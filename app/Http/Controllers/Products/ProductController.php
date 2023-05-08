<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Services\Products\ProductService as Service;

class ProductController extends BaseController
{
    protected $service;

    public function __construct(Service $service)
    {
        parent::__construct($service);
        // $this->service = $service;
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
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $products)
    {
        //
    }
}
