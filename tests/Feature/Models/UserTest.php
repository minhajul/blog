<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

describe('User model', function () {
    it('returns stored avatar url when avatar exists', function () {
        $user = User::factory()->make([
            'avatar_url' => 'avatars/user.png',
        ]);

        expect($user->avatarUrl())
            ->toBe(asset('avatars/user.png'));
    });

    it('returns placeholder avatar url when avatar does not exist', function () {
        $user = User::factory()->make([
            'avatar_url' => null,
        ]);

        expect($user->avatarUrl())
            ->toBe('https://placehold.co/150x150');
    });
});
