<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('about page is visible', function () {
    User::factory()->create();

    $this->get(route('about'))
        ->assertOk();
});
