<?php

namespace App\Services\Supplies;

use Inertia\Inertia;
use App\Models\Supplies\Supply;

class SupplyService
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $supplies = Supply::all();

        return Inertia::render('Supplies/index', [
           'items' => $supplies
        ]);
    }
}