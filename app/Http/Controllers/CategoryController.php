<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepository;
use App\Services\JsonFormatter;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {

    }

    public function create(Request $request, JsonFormatter $formater)
    {
        $data = $formater->formatJsonToArray($request->json);

        return new CategoryResource($this->repository->insertCategory($data));
    }
}
