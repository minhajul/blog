<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('renders about page successfully', function () {
    User::factory()->create();

    $this->get(route('about'))
        ->assertOk()
        ->assertViewHasAll(['user', 'typewriterText', 'skills']);
});

it('displays typewriter phrases', function () {
    User::factory()->create();

    $this->get(route('about'))
        ->assertOk()
        ->assertSee('Hello, I am Minhaj')
        ->assertSee('A Full Stack Software Engineer')
        ->assertSee('DevOps Enthusiast');
});

it('displays job title', function () {
    User::factory()->create();

    $this->get(route('about'))
        ->assertOk()
        ->assertSee('Software Engineer')
        ->assertSee('Technical Architect');
});

it('displays skills sections', function () {
    User::factory()->create();

    $this->get(route('about'))
        ->assertOk();
});

it('displays user bio', function () {
    $user = User::factory()->create();

    $this->get(route('about'))
        ->assertOk()
        ->assertSee($user->bio, false);
});

it('returns 200 and renders with user present', function () {
    User::factory()->create();

    $this->get(route('about'))
        ->assertOk()
        ->assertViewHasAll(['user', 'typewriterText', 'skills']);
});
