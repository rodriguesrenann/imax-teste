<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/categories', 'CategoryController@index');
Route::post('/categories', 'CategoryController@create');
Route::get('/products', 'ProductController@index');
Route::post('/products', 'ProductController@create');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
