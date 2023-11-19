<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
        Route::controller(App\Http\Controllers\HomeController::class)
            ->prefix('/')
            ->group(function () {
                Route::get('/', 'index')->name('home');
            });

        Route::controller(App\Http\Controllers\PagesController::class)
            ->group(function () {
                Route::get('/about', 'index')->name('about');
                Route::get('/contact', 'index')->name('contact');
                Route::post('/contact-us', 'contactuUs')->name('contact-us');
            });

        Route::controller(App\Http\Controllers\ServiceController::class)
            ->prefix('/services')
            ->group(function () {
                Route::get('/', 'index')->name('services');
                Route::get('/{slug}', 'show')->name('service');
            });

        Route::controller(App\Http\Controllers\CompletedWorkController::class)
            ->prefix('/completed-works')
            ->group(function () {
                Route::get('/', 'index')->name('completed-works');
            });

        Route::controller(App\Http\Controllers\GalleryController::class)
            ->group(function () {
                Route::get('/gallery', 'index')->name('gallery');
                Route::get('/certificates', 'index')->name('certificates');
            });
    });
