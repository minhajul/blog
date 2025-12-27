<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('home page is visible', function () {
    $this->get(route('home'))
        ->assertOk();
});
