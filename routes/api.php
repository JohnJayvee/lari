<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('user', [ApiController::class, 'index']);
Route::get('products/{id}', [ApiController::class, 'show']);
Route::post('products', [ApiController::class, 'store']);
Route::put('products/{id}', [ApiController::class, 'update']);
Route::delete('products/{id}', [ApiController::class, 'delete']);