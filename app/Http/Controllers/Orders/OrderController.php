<?php

namespace App\Http\Controllers\Orders;

use Inertia\Response;
use App\Models\Orders\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Orders\StoreRequest;
use App\Http\Requests\Orders\UpdateRequest;
use App\Services\Orders\OrderService as Service;

class OrderController extends BaseController
{
    protected $service;

    public function __construct(Service $service)
    {
        parent::__construct($service);
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
    public function edit(Order $order): Response
    {
        return $this->service->edit($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Order $order): RedirectResponse
    {
        return $this->service->update($request->validated(), $order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): JsonResponse
    {
        return $this->service->destroy($order);
    }
}
