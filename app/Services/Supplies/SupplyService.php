<?php

namespace App\Services\Supplies;

use Inertia\Inertia;
use Inertia\Response;
use App\Services\BaseService;
use App\Models\Supplies\Supply;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\Supplies\SupplyEditResource;

class SupplyService extends BaseService
{
    public function __construct()
    {
        parent::__construct(model: new Supply, path: 'Supplies');
    }

    protected function getData(): array
    {
        return [
            'products' => Product::all(),
        ];
    }

    public function store(array $request): RedirectResponse
    {
        $model = $this->model->create($request);
        
        foreach ($request['products'] as $product) {
            $productModel = Product::findOrFail($product);
        
            $model->products()->attach($productModel->id,[
                'user_id' => Auth::user()->id,
                'count' => $productModel->multiplicity
            ]);
        }
            
        return to_route('supplies.index');
    }

    public function edit($model): Response
    {
        $data = $this->getData();

        return Inertia::render($this->path.'/edit', [
            'model' => new SupplyEditResource($model),
            'data' => $data
        ]);
    }

    public function update(array $request, $model): RedirectResponse
    {
        $model->update($request);
        $model->products()->detach();
        foreach ($request['products'] as $product) {
            $productModel = Product::findOrFail($product);
            $model->products()->attach($productModel->id,[
                'user_id' => Auth::user()->id,
                'count' => $productModel->multiplicity
            ]);
        }
        

        return to_route('supplies.index');
    }
}