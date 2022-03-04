<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Services\JsonFormatter;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Request $request, JsonFormatter $jsonFormater)
    {

    }
}
