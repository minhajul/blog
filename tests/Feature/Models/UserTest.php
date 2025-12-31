<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);

describe('User Model', function () {
    it('returns stored avatar url when avatar exists', function () {
        $user = User::factory()->make([
            'avatar_url' => 'avatars/user.png',
        ]);

        expect($user->avatarUrl())
            ->toBe(asset('avatars/user.png'));
    });

    it('casts email_verified_at to datetime', function () {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        expect($user->email_verified_at)
            ->toBeInstanceOf(Carbon::class);
    });

    it('returns placeholder avatar url when avatar does not exist', function () {
        $user = User::factory()->make([
            'avatar_url' => null,
        ]);

        expect($user->avatarUrl())
            ->toBe('https://placehold.co/150x150');
    });
});
