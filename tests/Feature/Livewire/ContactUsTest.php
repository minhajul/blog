<?php

declare(strict_types=1);

use App\Livewire\ContactUs;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

describe('ContactUs Component', function () {
    test('contact page can be rendered', function () {
        $this->get(route('contact'))
            ->assertOk();
    });

    test('component renders successfully', function () {
        Livewire::test(ContactUs::class)
            ->assertOk();
    });

    test('can set name property', function () {
        Livewire::test(ContactUs::class)
            ->set('name', 'John Doe')
            ->assertSet('name', 'John Doe');
    });

    test('can set email property', function () {
        Livewire::test(ContactUs::class)
            ->set('email', 'john@example.com')
            ->assertSet('email', 'john@example.com');
    });

    test('can set message property', function () {
        Livewire::test(ContactUs::class)
            ->set('message', 'Hello, this is a test message.')
            ->assertSet('message', 'Hello, this is a test message.');
    });

    test('validates name is required', function () {
        Livewire::test(ContactUs::class)
            ->set('name', '')
            ->set('email', 'john@example.com')
            ->set('message', 'Test message')
            ->call('submit')
            ->assertHasErrors('name');
    });

    test('validates email is required', function () {
        Livewire::test(ContactUs::class)
            ->set('name', 'John Doe')
            ->set('email', '')
            ->set('message', 'Test message')
            ->call('submit')
            ->assertHasErrors('email');
    });

    test('validates email must be valid format', function () {
        Livewire::test(ContactUs::class)
            ->set('name', 'John Doe')
            ->set('email', 'invalid-email')
            ->set('message', 'Test message')
            ->call('submit')
            ->assertHasErrors('email');
    });

    test('validates message is required', function () {
        Livewire::test(ContactUs::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@example.com')
            ->set('message', '')
            ->call('submit')
            ->assertHasErrors('message');
    });

    test('can submit with valid data', function () {
        Livewire::test(ContactUs::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@example.com')
            ->set('message', 'Hello, this is a test message.')
            ->call('submit')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('contacts', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Hello, this is a test message.',
        ]);
    });

    test('creates contact record on submit', function () {
        Livewire::test(ContactUs::class)
            ->set('name', 'Jane Doe')
            ->set('email', 'jane@example.com')
            ->set('message', 'Test message content')
            ->call('submit');

        expect(Contact::where('email', 'jane@example.com')->exists())->toBeTrue();
    });

    test('redirects to contact page after submission', function () {
        Livewire::test(ContactUs::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@example.com')
            ->set('message', 'Test message')
            ->call('submit')
            ->assertRedirect(route('contact'));
    });

    test('sets success flash message after submission', function () {
        Livewire::test(ContactUs::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@example.com')
            ->set('message', 'Test message')
            ->call('submit')
            ->assertSessionHas('success');
    });
});
