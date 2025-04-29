<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [AdminController::class, 'indexView'])->name('home');
Route::get('/users', [UserController::class, 'indexView'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/trashed', [UserController::class, 'trashed'])->name('users.trashed');
Auth::routes();
