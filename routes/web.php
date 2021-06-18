<?php

use App\Http\Controllers\Profile\SubscriberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Profile\InfoController;
use App\Http\Controllers\Profile\BlogController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [InfoController::class, 'index'])->name('profile.index');
    Route::get('/blogs', [BlogController::class, 'index'])->name('profile.blogs');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('profile.blog.create');
    Route::post('/upload', [BlogController::class, 'upload'])->name('upload.file');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('profile.blog.store');
    Route::get('/blogs/edit/{blog}', [BlogController::class, 'show'])->name('profile.blog.show');
    Route::post('/blogs/edit/{blog}', [BlogController::class, 'update'])->name('profile.blog.update');
    Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
    Route::get('/subscribers/download', [SubscriberController::class, 'download'])->name('subscribers.download');
});

