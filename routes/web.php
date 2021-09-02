<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);

Route::post('/todo/create', [TodoController::class, 'create']);
// Route::post('/todo/create', [TodoController::class, 'datetime']);
Route::post('/todo/update/{id}', [TodoController::class, 'edit']);
Route::post('/todo/update/{id}', [TodoController::class, 'update']);
// Route::post('/todo/update/{id}', [TodoController::class, 'datetime']);
Route::post('/todo/delete/{id}', [TodoController::class, 'delete']);
Route::post('/todo/delete/{id}', [TodoController::class, 'remove']);