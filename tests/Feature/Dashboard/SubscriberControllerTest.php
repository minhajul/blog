<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows an authenticated user to view subscriber settings', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('subscribers.index'))
        ->assertOk();
});
