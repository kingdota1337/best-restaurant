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
        $color = round((float)$request['color']['a'] * 10, 2);
        $gasification = round((float)$request['gasification'] / 10, 2);
        $sugar = (float)$request['sugar'];
        $calories = (float)$request['calories'];

        $pyscript = 'E:\\OSPanel\\domains\\tsh\\app\\Services\\Products\\neron.py'; 
        $python = 'F:\\python\python.exe';
        $result = exec("$python $pyscript $sugar $calories $color $gasification");
 
        return response()->json(['sub_type_id' => (int)$result]);
    }
}
