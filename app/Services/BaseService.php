<?php

namespace App\Services;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;

class BaseService 
{
    protected $model;
    protected $path;

    public function __construct(Model $model, string $path)
    {
        $this->model = $model;
        $this->path = $path;
    }

    public function index()
    {
        $items = $this->model->all();

        return Inertia::render($this->path.'/index', [
            'items' => $items
        ]);
    }

    public function create()
    {
        $data = $this->getData();

        return Inertia::render($this->path.'/create',[
            'data' => $data
        ]);
    }

    public function store(array $request): RedirectResponse
    {
        $this->model->create($request);

        return to_route(strtolower($this->path).'.index');
    }

    public function edit(Model $model): Response
    {
        $data = $this->getData();

        return Inertia::render($this->path.'/edit', [
            'model' => $model,
            'data' => $data
        ]);
    }

    public function update(array $request, Model $model): RedirectResponse
    {
        $model->update($request);

        return to_route(strtolower($this->path).'.index');
    }

    public function destroy(Model $model): JsonResponse
    {
        $model->delete();

        return response()->json(['success' => true]);
    }

    protected function getData(): array
    {
        return [];
    }
}