<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);
Route::get('/create', [TodoController::class, 'create']);
Route::post('/store', [TodoController::class, 'store']);
Route::post('/toggle/{id}', [TodoController::class, 'toggle']);
Route::delete('/delete/{id}', [TodoController::class, 'destroy']);