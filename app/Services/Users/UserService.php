<?php

namespace App\Services\Users;

use App\Models\User;
use Inertia\Inertia;
use App\Services\BaseService;

class UserService extends BaseService
{
    public function __construct()
    {
        parent::__construct(model: new User, path: 'Users');
    }
}