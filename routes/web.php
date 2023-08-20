<?php

use App\Http\Controllers\StudentController;
use App\Jobs\StudenRegistrationProcess;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'insert']);
Route::post('/', [StudentController::class, 'upload']);
Route::get('/batch', [StudentController::class, 'batch']);
Route::get('/progress', [StudentController::class, 'batchInProgress']);