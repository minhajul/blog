<?php

declare(strict_types=1);

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\BlogController;
use App\Http\Controllers\Profile\GalleryController;
use App\Http\Controllers\Profile\InfoController;
use App\Http\Controllers\Profile\SettingsController;
use App\Http\Controllers\Profile\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Blog\Index::class)->name('home');
Route::get('/details/{blog:slug}', [HomeController::class, 'show'])->name('blog.show');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/verify/subscription/{email}', [HomeController::class, 'verify'])->name('subscription.verify');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [InfoController::class, 'index'])->name('profile.index');
    Route::get('/contacts', [InfoController::class, 'contacts'])->name('profile.contacts');

    Route::name('profile')->resource('/profile/blogs', BlogController::class);
    Route::post('profile/upload/file', [BlogController::class, 'upload'])->name('profile.blogs.upload.file');
    Route::get('profile/blogs/archived/{blog}', [BlogController::class, 'markAsArchived'])->name('profile.blogs.archived');

    Route::name('profile')->resource('/profile/gallery', GalleryController::class);

    Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
    Route::delete('/subscribers/{subscriber}/delete', [SubscriberController::class, 'delete'])->name('subscribers.delete');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
});

Route::get('/contact', \App\Livewire\ContactUs::class)->name('contact.index');

require __DIR__.'/auth.php';
