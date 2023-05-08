<?php

namespace App\Http\Controllers\Products;

use Inertia\Response;
use App\Models\Products\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Products\StoreRequest;
use App\Http\Requests\Products\UpdateRequest;
use App\Services\Products\ProductService as Service;

class ProductController extends BaseController
{
    protected $service;

    public function __construct(Service $service)
    {
        parent::__construct($service);
    }

   /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return $this->service->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        return $this->service->store($request->validated());
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): Response
    {
        return $this->service->edit($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product): RedirectResponse
    {
        return $this->service->update($request->validated(), $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): JsonResponse
    {
        return $this->service->destroy($product);
    }
}
