<?php

namespace App\Services\Users;

use Inertia\Inertia;

class UserService 
{
    public function index()
    {
        return Inertia::render('Users/index');
    }
}