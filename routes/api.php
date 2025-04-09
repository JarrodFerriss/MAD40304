<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TokenController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::apiResource('articles', ArticleController::class);
    Route::apiResource('categories', CategoryController::class);
});

Route::post('/tokens/create', [TokenController::class, 'create']);
Route::delete('/tokens/delete', [TokenController::class, 'destroy']);
