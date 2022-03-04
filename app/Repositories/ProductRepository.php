<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function insertProduct($data): Product
    {
        return $this->model->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'category_id' => $data['category_id']
        ]);
    }

    public function getAllProducts(): Collection
    {
        return $this->model->all();
    }
}