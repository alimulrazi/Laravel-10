<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\InvoiceController;
use App\Http\Controllers\API\V1\CustomerController;


// public route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/refresh', [AuthController::class, 'refresh']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('posts', PostsController::class);
});


Route::apiResource('products', ProductController::class);

// url: http://127.0.0.1:8001/api/v1/
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\API\V1', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/dashboard', function () {
        return response()->json(['message' => 'This is a protected route of dashboard']);
    });

    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
    Route::post('invoices/bulk', ['uses' => 'InvoiceController@bulkStore']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
