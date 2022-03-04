<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepository;
use App\Services\JsonFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($data, [
            'name' => 'max:30'
        ]);

        if ($validator->fails()) {
            return  response()->json([
                'error' => $validator->errors()->first()
            ], 400);
        }

        return new CategoryResource($this->repository->insertCategory($data));
    }
}
