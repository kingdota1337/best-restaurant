<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Inertia\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Services\Users\UserService as Service;


class UserController extends BaseController
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
    public function edit(User $user): Response
    {
        return $this->service->edit($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user): RedirectResponse
    {
        return $this->service->update($request->validated(), $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): JsonResponse
    {
        return $this->service->destroy($user);
    }
}
