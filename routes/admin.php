<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogPostController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\EntityController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [AdminProfileController::class, 'profileUpdate'])->name('profile.update');
Route::get('/profile/password', [AdminProfileController::class, 'profilePassword'])->name('profile.password');
Route::post('/profile/password/update', [AdminProfileController::class, 'profilePasswordUpdate'])->name('profile.password.update');

/** Category routes */
Route::put('/category/change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('/category', CategoryController::class);

/** Entity routes */
Route::put('/entity/change-status', [EntityController::class, 'changeStatus'])->name('entity.change-status');
Route::resource('/entity', EntityController::class);

/** Blog routes */
Route::put('/blog/category/change-status', [BlogCategoryController::class, 'changeStatus'])->name('blog.category.change-status');
Route::resource('/blog/category', BlogCategoryController::class, ['as' => 'blog']);
Route::resource('/blog/post', BlogPostController::class, ['as' => 'blog']);
