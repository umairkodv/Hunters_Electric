<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\MainCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\QuotationController;
use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    // Login screen and submission. The "already logged in" redirect is
    // handled explicitly inside AuthController::showLoginForm() rather
    // than via the framework's 'guest' middleware, since this app has no
    // 'dashboard' named route for that middleware to fall back to.
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.attempt');

    // Auth-gated: everything else in the admin panel
    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('departments', DepartmentController::class)->except('show');
        Route::resource('main-categories', MainCategoryController::class)->except('show');
        Route::resource('subcategories', SubcategoryController::class)->except('show');
        Route::resource('products', ProductController::class)->except('show');
        Route::resource('quotations', QuotationController::class)->only(['index', 'show', 'update', 'destroy']);
    });
});
