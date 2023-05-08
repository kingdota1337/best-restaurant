<?php

namespace App\Http\Controllers\Supplies;

use Illuminate\Http\Request;
use App\Models\Supplies\Supply;
use App\Http\Controllers\BaseController;
use App\Services\Supplies\SupplyService as Service;

class SupplyController extends BaseController
{
    protected $service;

    public function __construct(Service $service)
    {
        parent::__construct($service);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supply $supply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supply $supply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supply $supply)
    {
        //
    }
}
