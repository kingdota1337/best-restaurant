<?php

namespace App\Http\Controllers\Users;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Users/index');
    }
}