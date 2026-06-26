<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
Route::patch('/todos/{todo}/complete', [TodoController::class, 'complete'])->name('todos.complete');
Route::patch('/todos/{todo}/undo', [TodoController::class, 'undo'])->name('todos.undo');
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
