<?php

namespace App\Http\Controllers;

abstract class BaseController extends Controller
{
    protected $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return $this->service->index();
    }
}
