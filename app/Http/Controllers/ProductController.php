<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\ProductResource;
use App\Repositories\ProductRepository;
use App\Services\JsonFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Request $request, JsonFormatter $jsonFormater)
    {   
        $data = $jsonFormater->formatJsonToArray($request->json);

        $validator = Validator::make($data, [
            'name' => 'max:30',
            'description' => 'max:150',
            'price' => 'max:20000',
            'category_id' => 'exists:categories,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ], 400);
        }

        return new ProductResource($this->repository->insertProduct($data));
    }

    public function index()
    {
        return ProductResource::collection($this->repository->getAllProducts());
    }
}
