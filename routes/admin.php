<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [AdminProfileController::class, 'profileUpdate'])->name('profile.update');
