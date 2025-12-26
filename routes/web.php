<?php

declare(strict_types=1);

use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\GalleryController;
use App\Http\Controllers\HomeController;
use App\Livewire\ContactUs;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\Blog\Index::class)->name('home');
Route::get('/details/{blog:slug}', [HomeController::class, 'show'])->name('blog.show');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', ContactUs::class)->name('contact');

Route::get('/verify/subscription/{email}', [HomeController::class, 'verify'])->name('subscription.verify');

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/contacts', App\Livewire\Dashboard\ContactList::class)->name('contacts.index');

    Route::resource('/blogs', BlogController::class)
        ->names('dashboard.blogs');
    Route::post('/upload/file', [BlogController::class, 'upload'])->name('profile.blogs.upload.file');
    Route::get('/blogs/archived/{blog}', [BlogController::class, 'markAsArchived'])->name('profile.blogs.archived');

    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/create', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/delete/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.store');

    Route::get('/subscribers', App\Livewire\Dashboard\Subscribers::class)->name('subscribers.index');
});

require __DIR__.'/auth.php';
