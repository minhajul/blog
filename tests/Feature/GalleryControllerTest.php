<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('gallery page is visible', function () {
    $this->get(route('gallery'))
        ->assertOk();
});
