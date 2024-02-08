<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
