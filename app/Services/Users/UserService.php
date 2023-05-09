<?php

namespace App\Services\Users;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Services\BaseService;
use Spatie\Permission\Models\Role;
use App\Http\Resources\Users\UserEditResource;

class UserService extends BaseService
{
    public function __construct()
    {
        parent::__construct(model: new User, path: 'Users');
    }

    protected function getData(): array
    {
        return [
            'roles' => Role::all(),
        ];
    }

    public function edit($model): Response
    {
        $data = $this->getData();

        return Inertia::render($this->path.'/edit', [
            'model' => new UserEditResource($model),
            'data' => $data
        ]);
    }
}