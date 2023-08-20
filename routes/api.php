<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [StudentController::class, 'insert']);
Route::post('/', [StudentController::class, 'upload']);
Route::get('/batch', [StudentController::class, 'batch']);
Route::get('/progress', [StudentController::class, 'batchInProgress']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
