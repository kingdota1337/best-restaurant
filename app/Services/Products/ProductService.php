<?php

namespace App\Services\Products;

use Inertia\Inertia;
use App\Services\BaseService;
use App\Models\References\Type;
use App\Models\Products\Product;
use App\Models\References\SubType;

class ProductService extends BaseService
{
    public function __construct()
    {
        parent::__construct(model: new Product, path: 'Products');
    }

    protected function getData(): array
    {
        return [
            'types' => Type::all(),
            'subTypes' => SubType::all(),
        ];
    }

    public function predictSubtype(array $request)
    {
        $result = 1;
        return response()->json(['sub_type_id' => $result]);
    }
}