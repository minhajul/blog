<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class)->group('dashboard', 'info');

it('redirects unauthenticated users when accessing the dashboard', function () {
    $this->get(route('dashboard'))
        ->assertRedirect();
});

it('allows an authenticated user to view the dashboard profile', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('dashboard'))
        ->assertOk();
});

it('allows an authenticated user to view the contact page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('contacts.index'))
        ->assertOk();
});
