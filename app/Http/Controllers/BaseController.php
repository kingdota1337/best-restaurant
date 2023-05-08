<?php

namespace App\Http\Controllers;

use Inertia\Response;

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

   /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return $this->service->create();
    }
}
