<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/search', [SearchController::class, 'index'])->name('search');

// Customer auth (default 'web' guard, separate from the 'admin' guard).
// Must stay above the dynamic catalog wildcard routes below for the same
// reason /search and /admin do.
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.attempt');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/account', [AccountController::class, 'dashboard'])->name('account.dashboard');
    Route::get('/account/edit', [AccountController::class, 'editProfile'])->name('account.edit');
    Route::put('/account', [AccountController::class, 'updateProfile'])->name('account.update');
    Route::get('/quote/start/{product}', [QuoteController::class, 'start'])->name('quote.start');
});

// Admin panel routes (auth-gated, own guard). Must be registered before the
// dynamic catalog wildcard routes below, since those wildcards would
// otherwise swallow any /admin/... path with a matching segment count.
require __DIR__.'/admin.php';

// Dynamic catalog hierarchy — resolved entirely from the database by slug.
// Replaces the previous 6 hardcoded per-department routes.
// NOTE: these must stay below any fixed-path routes (like /search, /login,
// /register, /account, and /admin above), since /{department} would
// otherwise swallow them.
Route::get('/{department}/{mainCategory}/{subcategory}/{product}', [ProductController::class, 'show'])
    ->name('product.show');

Route::get('/{department}/{mainCategory}/{subcategory}', [DepartmentController::class, 'subcategory'])
    ->name('department.subcategory');

Route::get('/{department}/{mainCategory}', [DepartmentController::class, 'mainCategory'])
    ->name('department.mainCategory');

Route::get('/{department}', [DepartmentController::class, 'show'])
    ->name('department.show');
