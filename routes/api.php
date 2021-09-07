<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('refresh', [AuthController::class, 'refresh']);
        Route::get('me', [AuthController::class, 'me']);
        Route::get('delete', [AuthController::class, 'delete']);
    });
    Route::group(['prefix' => 'admin/auth'], function () {
        Route::post('login', [AdminController::class, 'login']);
        Route::get('logout', [AdminController::class, 'logout']);
        Route::get('refresh', [AdminController::class, 'refresh']);
        Route::get('me', [AdminController::class, 'me']);
    });
    Route::apiResource('product',ProductController::class);
});

/*Route::get('product', [ProductController::class, 'index']);
Route::post('product', [ProductController::class, 'store']);
Route::get('product/{product}', [ProductController::class, 'show']);
Route::put('product/{product}', [ProductController::class, 'update']);
Route::delete('product/{product}', [ProductController::class, 'destroy']);*/
