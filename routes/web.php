<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/store', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/complete/{task}', [TaskController::class, 'complete'])->name('tasks.complete');
Route::delete('/delete/{task}', [TaskController::class, 'destroy'])->name('tasks.delete');


