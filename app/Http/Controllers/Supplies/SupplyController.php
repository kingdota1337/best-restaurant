<?php

namespace App\Http\Controllers\Supplies;

use Inertia\Response;
use App\Models\Supplies\Supply;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Supplies\StoreRequest;
use App\Http\Requests\Supplies\UpdateRequest;
use App\Services\Supplies\SupplyService as Service;

class SupplyController extends BaseController
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
    public function edit(Supply $supply): Response
    {
        return $this->service->edit($supply);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Supply $supply): RedirectResponse
    {
        return $this->service->update($request->validated(), $supply);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supply $supply): JsonResponse
    {
        return $this->service->destroy($supply);
    }
}
