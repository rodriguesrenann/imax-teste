<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function insertCategory(array $data)
    {
        return $this->model->create([
            'name' => $data['name']
        ]);
    }
}