<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);

Route::post('/todo/create', [TodoController::class, 'create']);
Route::post('/todo/{id}/update', [TodoController::class, 'edit']);
Route::post('/todo/{id}/update', [TodoController::class, 'update']);
Route::post('/todo/delete', [TodoController::class, 'delete']);
Route::post('/todo/delete', [TodoController::class, 'remove']);