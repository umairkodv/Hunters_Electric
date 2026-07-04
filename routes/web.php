<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/search', [SearchController::class, 'index'])->name('search');

// Dynamic catalog hierarchy — resolved entirely from the database by slug.
// Replaces the previous 6 hardcoded per-department routes.
// NOTE: these must stay below any fixed-path routes (like /search above),
// since /{department} would otherwise swallow them.
Route::get('/{department}/{mainCategory}/{subcategory}/{product}', [ProductController::class, 'show'])
    ->name('product.show');

Route::get('/{department}/{mainCategory}/{subcategory}', [DepartmentController::class, 'subcategory'])
    ->name('department.subcategory');

Route::get('/{department}/{mainCategory}', [DepartmentController::class, 'mainCategory'])
    ->name('department.mainCategory');

Route::get('/{department}', [DepartmentController::class, 'show'])
    ->name('department.show');
