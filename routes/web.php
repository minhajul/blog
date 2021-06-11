<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/details/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/upload', [BlogController::class, 'upload'])->name('upload.file');

Route::group(['middleware' => 'auth'], function (){
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('blogs', [ProfileController::class, 'blogs'])->name('profile.blogs');
    Route::get('blogs/create', [ProfileController::class, 'create'])->name('profile.blog.create');
    Route::post('blog/store', [ProfileController::class, 'store'])->name('profile.blog.store');
    Route::get('blogs/edit/{blog}', [ProfileController::class, 'show'])->name('profile.blog.show');
    Route::post('blogs/edit/{blog}', [ProfileController::class, 'update'])->name('profile.blog.update');
});

