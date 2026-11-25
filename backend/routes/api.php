<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/categories', [CategoryController::class, 'index']);
