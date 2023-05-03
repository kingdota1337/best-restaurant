<?php

namespace App\Services\Foods;

use Inertia\Inertia;
use App\Models\Foods\Food;

class FoodService
{
    /**
    * Display a listing of the resource.
    */
    public function index(): \Inertia\Response
    {
        $foods = Food::all();
        
        return Inertia::render('Foods/index', [
            'items' => $foods,
        ]);
    }
}