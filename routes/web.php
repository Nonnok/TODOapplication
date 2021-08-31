<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);

Route::post('/todo/create', [TodoController::class, 'index']);
Route::post('/todo/update', [TodoController::class, 'index']);
Route::post('/todo/delete', [TodoController::class, 'index']);