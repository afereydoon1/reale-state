<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\app\HomeController;
use App\Http\Controllers\app\AdsHomeController;
use App\Http\Controllers\app\BlogController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/search', [HomeController::class, 'search'])->name('search');

//pages
Route::get('/about', [HomeController::class, 'aboutUs'])->name('about');

//ads
Route::prefix('ads')->group(function () {
    Route::get('/', [AdsHomeController::class, 'Index'])->name('ads.home.index');
    Route::get('/single/{ad}', [AdsHomeController::class, 'single'])->name('ads.single');
    Route::get('/category/{category}', [AdsHomeController::class, 'category'])->name('ads.category');
});

//blog
Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'Index'])->name('blog.home.index');
    Route::get('/single/{post}', [BlogController::class, 'single'])->name('blog.single');
    Route::get('/category/{category}', [BlogController::class, 'category'])->name('blog.category');
});





