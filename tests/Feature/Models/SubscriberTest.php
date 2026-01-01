<?php

declare(strict_types=1);

use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);

describe('Subscriber Model', function () {
    it('determines whether subscriber is verified', function () {
        $verifiedSubscriber = Subscriber::factory()->make([
            'verified_at' => now(),
        ]);

        $unverifiedSubscriber = Subscriber::factory()->make([
            'verified_at' => null,
        ]);

        expect($verifiedSubscriber->isVerified())->toBeTrue()
            ->and($unverifiedSubscriber->isVerified())->toBeFalse();
    });

    it('returns correct status based on verification state', function () {
        $verified = Subscriber::factory()->make([
            'verified_at' => now(),
        ]);

        $unverified = Subscriber::factory()->make([
            'verified_at' => null,
        ]);

        expect($verified->status())->toBe('Verified')
            ->and($unverified->status())->toBe('Not Verified');
    });

    it('marks subscriber as verified', function () {
        Carbon::setTestNow(now());

        $subscriber = Subscriber::factory()->create([
            'verified_at' => null,
        ]);

        $subscriber->markAsVerified();

        expect($subscriber->fresh()->verified_at)
            ->not
            ->toBeNull()
            ->and($subscriber->verified_at)->toEqual(now());
    });

    it('returns only verified subscribers using verified scope', function () {
        Subscriber::factory()->count(2)->create([
            'verified_at' => now(),
        ]);

        Subscriber::factory()->count(3)->create([
            'verified_at' => null,
        ]);

        $verifiedSubscribers = Subscriber::verified()->get();

        expect($verifiedSubscribers)
            ->toHaveCount(2)
            ->each(fn ($subscriber) => expect($subscriber->verified_at)->not->toBeNull());
    });
});
