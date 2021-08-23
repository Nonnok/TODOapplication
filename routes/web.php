<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);

Route::post('/todo/create', [TodoController::create, '']);
Route::post('/todo/update', [TodoController::update, '']);
Route::post('/todo/delete', [TodoController::delete, '']);