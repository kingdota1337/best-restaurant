<?php

namespace App\Services\Orders;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Orders\Order;
use App\Services\BaseService;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\Orders\OrderEditResource;

class OrderService extends BaseService
{
    public function __construct()
    {
        parent::__construct(model: new Order, path: 'Orders');
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
            
        return to_route('orders.index');
    }

    public function edit($model): Response
    {
        $data = $this->getData();

        return Inertia::render($this->path.'/edit', [
            'model' => new OrderEditResource($model),
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
        

        return to_route('orders.index');
    }
}