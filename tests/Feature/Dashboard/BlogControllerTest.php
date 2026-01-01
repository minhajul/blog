<?php

declare(strict_types=1);

use App\Enums\BlogStatus;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

beforeEach(function () {
    $user = User::factory()->create();
    $this->actingAs($user);
});

it('authenticated user can view blogs', function () {
    $this->get(route('dashboard.blogs.index'))
        ->assertOk();
});

it('authenticated user can view the blog create page', function () {
    $this->get(route('dashboard.blogs.create'))
        ->assertOk();
});

it('authenticated user can create a blog', function () {
    Storage::fake('blog');

    $this->post(route('dashboard.blogs.store'), [
        'title' => fake()->title(),
        'banner' => UploadedFile::fake()->image('avatar.jpg'),
        'details' => fake()->sentence(),
        'status' => fake()->randomElement(BlogStatus::values()),
    ])->assertRedirect()->assertSessionHasNoErrors();
});

it('authenticated user can view a blog for editing', function () {
    $blog = Blog::factory()->create();

    $this->get(route('dashboard.blogs.show', $blog))
        ->assertOk();
});

it('authenticated user can update a blog', function () {
    Storage::fake('blog');

    $blog = Blog::factory()->create();

    $this->post(route('dashboard.blogs.store', $blog), [
        'title' => fake()->title(),
        'banner' => UploadedFile::fake()->image('avatar.jpg'),
        'details' => fake()->sentence(),
        'status' => fake()->randomElement(BlogStatus::values()),
    ])->assertRedirect()->assertSessionHasNoErrors();
});
