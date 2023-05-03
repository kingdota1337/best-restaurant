<?php

namespace App\Services\Users;

use App\Models\User;
use Inertia\Inertia;

class UserService 
{
    public function index()
    {
        $users = User::all();

        return Inertia::render('Users/index', [
            'items' => $users
        ]);
    }
}