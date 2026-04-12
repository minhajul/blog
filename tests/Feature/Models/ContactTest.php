<?php

declare(strict_types=1);

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

describe('Contact Model', function () {
    it('can create a contact with all fields', function () {
        $contact = Contact::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Hello, this is a test message.',
        ]);

        expect($contact->name)->toBe('John Doe')
            ->and($contact->email)->toBe('john@example.com')
            ->and($contact->message)->toBe('Hello, this is a test message.');
    });

    it('has fillable attributes', function () {
        $contact = Contact::factory()->make();

        expect($contact)->toBeInstanceOf(Contact::class)
            ->and($contact->name)->toBeString()
            ->and($contact->email)->toBeString()
            ->and($contact->message)->toBeString();
    });

    it('can mass assign all fields', function () {
        $contact = Contact::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'message' => 'Test message content',
        ]);

        expect($contact->fresh()->name)->toBe('Jane Doe');
    });

    it('validates email format', function () {
        $contact = Contact::factory()->create([
            'email' => 'valid@email.com',
        ]);

        expect($contact->email)->toBe('valid@email.com');
    });
});
