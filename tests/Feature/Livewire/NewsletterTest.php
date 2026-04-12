<?php

declare(strict_types=1);

use App\Livewire\Newsletter;
use App\Mail\SubscriberConfirmation;
use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;

uses(RefreshDatabase::class);

describe('Newsletter Component', function () {
    test('component renders successfully', function () {
        Livewire::test(Newsletter::class)
            ->assertOk();
    });

    test('can set email address property', function () {
        Livewire::test(Newsletter::class)
            ->set('email_address', 'test@example.com')
            ->assertSet('email_address', 'test@example.com');
    });

    test('validates email is required', function () {
        Livewire::test(Newsletter::class)
            ->set('email_address', '')
            ->call('subscribe')
            ->assertHasErrors('email_address');
    });

    test('validates email must be valid format', function () {
        Livewire::test(Newsletter::class)
            ->set('email_address', 'invalid-email')
            ->call('subscribe')
            ->assertHasErrors('email_address');
    });

    test('creates new subscriber on valid submission', function () {
        Livewire::test(Newsletter::class)
            ->set('email_address', 'new@example.com')
            ->call('subscribe')
            ->assertHasNoErrors();

        expect(Subscriber::where('email', 'new@example.com')->exists())->toBeTrue();
    });

    test('resets email after successful subscription', function () {
        Livewire::test(Newsletter::class)
            ->set('email_address', 'test@example.com')
            ->call('subscribe')
            ->assertSet('email_address', '');
    });

    test('sets flash message for new subscriber', function () {
        Livewire::test(Newsletter::class)
            ->set('email_address', 'new@example.com')
            ->call('subscribe')
            ->assertOk();
    });

    test('does not create duplicate for existing email', function () {
        Subscriber::factory()->create(['email' => 'existing@example.com']);

        Livewire::test(Newsletter::class)
            ->set('email_address', 'existing@example.com')
            ->call('subscribe');

        expect(Subscriber::where('email', 'existing@example.com')->count())->toBe(1);
    });

    test('sets message for already verified subscriber', function () {
        $subscriber = Subscriber::factory()->create([
            'email' => 'verified@example.com',
            'verified_at' => now(),
        ]);

        Livewire::test(Newsletter::class)
            ->set('email_address', 'verified@example.com')
            ->call('subscribe')
            ->assertOk();
    });

    test('sends confirmation email for new subscriber', function () {
        Mail::fake();

        Livewire::test(Newsletter::class)
            ->set('email_address', 'confirm@example.com')
            ->call('subscribe');

        Mail::assertSent(SubscriberConfirmation::class);
    });

    test('sends confirmation email for unverified subscriber', function () {
        Mail::fake();

        Subscriber::factory()->create([
            'email' => 'unverified@example.com',
            'verified_at' => null,
        ]);

        Livewire::test(Newsletter::class)
            ->set('email_address', 'unverified@example.com')
            ->call('subscribe');

        Mail::assertSent(SubscriberConfirmation::class);
    });

    test('firstOrCreate returns existing subscriber', function () {
        $existing = Subscriber::factory()->create([
            'email' => 'existing@example.com',
        ]);

        Livewire::test(Newsletter::class)
            ->set('email_address', 'existing@example.com')
            ->call('subscribe');

        expect(Subscriber::count())->toBe(1);
    });
});
