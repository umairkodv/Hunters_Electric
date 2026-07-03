<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Same static URLs as before; the department "title" is bound via defaults()
// so DepartmentController::show() can look up the correct department.
// Dynamic /{department} slug routing is planned for a later phase.
Route::get('/alternators', [DepartmentController::class, 'show'])
    ->defaults('title', 'Alternators')
    ->name('alternators');

Route::get('/starters', [DepartmentController::class, 'show'])
    ->defaults('title', 'Starters')
    ->name('starters');

Route::get('/motors', [DepartmentController::class, 'show'])
    ->defaults('title', 'Motors')
    ->name('motors');

Route::get('/generators', [DepartmentController::class, 'show'])
    ->defaults('title', 'Generators')
    ->name('generators');

Route::get('/components', [DepartmentController::class, 'show'])
    ->defaults('title', 'Components')
    ->name('components');

Route::get('/accessories', [DepartmentController::class, 'show'])
    ->defaults('title', 'Accessories')
    ->name('accessories');
