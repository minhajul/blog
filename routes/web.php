<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/details/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::group(['middleware' => 'auth'], function (){
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/blogs', [ProfileController::class, 'blogs'])->name('profile.blogs');
    Route::get('profile/blogs/{blog}', [ProfileController::class, 'show'])->name('profile.blog.show');
});

