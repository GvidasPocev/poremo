<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(App\Http\Controllers\HomeController::class)
    ->prefix('/')
    ->group(function () {
        Route::get('/', 'index')->name('home');
    });

Route::controller(App\Http\Controllers\PagesController::class)
    ->group(function () {
        Route::get('/contact', 'index')->name('contact');
        Route::post('/contact-us', 'contactuUs')->name('contact-us');
    });
