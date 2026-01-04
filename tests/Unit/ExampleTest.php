<?php

declare(strict_types=1);

it('returns a successful response', function () {
    $this->get(route('home'))
        ->assertStatus(200);
});
