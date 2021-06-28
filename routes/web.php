<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Profile\InfoController;
use App\Http\Controllers\Profile\BlogController;
use App\Http\Controllers\Profile\SubscriberController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/verify/subscription/{email}', [HomeController::class, 'verify'])->name('subscription.verify');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [InfoController::class, 'index'])->name('profile.index');

    Route::get('/blogs', [BlogController::class, 'index'])->name('profile.blogs');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('profile.blog.create');
    Route::post('/upload', [BlogController::class, 'upload'])->name('upload.file');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('profile.blog.store');
    Route::get('/blogs/edit/{blog}', [BlogController::class, 'show'])->name('profile.blog.show');
    Route::post('/blogs/edit/{blog}', [BlogController::class, 'update'])->name('profile.blog.update');

    Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
    Route::delete('/subscribers/{subscriber}/delete', [SubscriberController::class, 'delete'])->name('subscribers.delete');
    Route::get('/subscribers/download', [SubscriberController::class, 'download'])->name('subscribers.download');

    Route::get('/contacts', [InfoController::class, 'contacts'])->name('profile.contacts');
});

