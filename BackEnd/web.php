<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers;



Route::get('/', [Controllers\CompanyController::class, 'index'])->name('home')->middleware('auth');
Route::resource('/company', Controllers\CompanyController::class)->middleware('auth');

require __DIR__.'/auth.php';
