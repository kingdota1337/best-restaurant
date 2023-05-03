<?php

namespace App\Service\Foods;

use Inertia\Inertia;

class FoodService
{
    /**
    * Display a listing of the resource.
    */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Foods/index');
    }
}