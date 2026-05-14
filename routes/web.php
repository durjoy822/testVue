<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Frontend
Route::get('/', fn() => Inertia::render('Frontend/Home'));
Route::get('/about', fn() => Inertia::render('Frontend/About'));
Route::get('/contact', fn() => Inertia::render('Frontend/Contact'));

// Admin Routes — middleware সরিয়ে দিলাম
// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', fn() => Inertia::render('Admin/Dashboard'));
//     Route::get('/users', fn() => Inertia::render('Admin/Users/Index'));
//     Route::get('/settings', fn() => Inertia::render('Admin/Settings/Index'));
// });


Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('dashboard')->name('dashboard.')->controller(AdminDashboardController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/users', 'users')->name('users');
                Route::get('/settings', 'settings')->name('settings');

            });

    });
