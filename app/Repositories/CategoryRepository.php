<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function insertCategory(array $data): Category
    {
        return $this->model->create([
            'name' => $data['name']
        ]);
    }

    public function getAllCategories(): Collection
    {
        return $this->model->all();
    }
}