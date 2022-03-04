<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/categories', 'CategoryController@create');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
