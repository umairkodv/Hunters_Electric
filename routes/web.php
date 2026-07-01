<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/alternators', function () {
    return view('alternators');
})->name('alternators');

Route::get('/starters', function () {
    return view('starters');
})->name('starters');

Route::get('/motors', function () {
    return view('motors');
})->name('motors');

Route::get('/generators', function () {
    return view('generators');
})->name('generators');

Route::get('/components', function () {
    return view('components');
})->name('components');

Route::get('/accessories', function () {
    return view('accessories');
})->name('accessories');
