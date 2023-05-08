<?php

namespace App\Services\Supplies;

use Inertia\Inertia;
use App\Services\BaseService;
use App\Models\Supplies\Supply;

class SupplyService extends BaseService
{
    public function __construct()
    {
        parent::__construct(model: new Supply, path: 'Supplies');
    }
}