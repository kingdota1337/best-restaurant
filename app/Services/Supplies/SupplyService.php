<?php

namespace App\Services\Supplies;

use Inertia\Inertia;

class SupplyService
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Supplies/index');
    }
}