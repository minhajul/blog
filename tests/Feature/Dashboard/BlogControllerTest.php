<?php

declare(strict_types=1);

use App\Enums\BlogStatus;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $user = User::factory()->create();
    $this->actingAs($user);
});

it('allows an authenticated user to view blogs', function () {
    $this->get(route('dashboard.blogs.index'))
        ->assertOk();
});

it('allows an authenticated user to view the blog create page', function () {
    $this->get(route('dashboard.blogs.create'))
        ->assertOk();
});

it('allows an authenticated user to create a blog', function () {
    Storage::fake('blog');

    $this->post(route('dashboard.blogs.store'), [
        'title' => fake()->title(),
        'banner' => UploadedFile::fake()->image('avatar.jpg'),
        'details' => fake()->sentence(),
        'status' => fake()->randomElement(BlogStatus::values()),
    ])
        ->assertRedirect()
        ->assertSessionHasNoErrors();
});

it('allows an authenticated user to view a blog for editing', function () {
    $blog = Blog::factory()->create();

    $this->get(route('dashboard.blogs.show', $blog))
        ->assertOk();
});

it('allows an authenticated user to update a blog', function () {
    Storage::fake('blog');

    $blog = Blog::factory()->create();

    $this->post(route('dashboard.blogs.store', $blog), [
        'title' => fake()->title(),
        'banner' => UploadedFile::fake()->image('avatar.jpg'),
        'details' => fake()->sentence(),
        'status' => fake()->randomElement(BlogStatus::values()),
    ])->assertRedirect()->assertSessionHasNoErrors();
});
