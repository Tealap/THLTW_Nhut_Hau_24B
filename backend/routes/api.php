<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GetCategoryByIdController;
use App\Http\Controllers\Api\GetCategoryBySlugController;
use App\Http\Controllers\Api\GetBrandsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/slug/{slug}', GetCategoryBySlugController::class);
Route::get('/categories/{id}', GetCategoryByIdController::class);

Route::get('/brands', GetBrandsController::class);
