<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

it('does not allow anonymous user to request password reset email', function () {
    $this->artisan('admin:recover-access')
        ->expectsQuestion('Input Your Email:', 'test@email.com')
        ->expectsOutput('No user found with the given email.')
        ->assertExitCode(1);
});

it('allows admin user to request password reset email', function () {
    Mail::fake();

    $user = User::factory()->create();

    $this->artisan('admin:recover-access')
        ->expectsQuestion('Input Your Email:', $user->email)
        ->expectsOutput('Password reset link has been sent to your given email.')
        ->assertExitCode(0);
});

it('does not allow admin user creation if user already exists', function () {
    User::factory()->create();

    $this->artisan('admin:create-user')
        ->expectsOutput('You have already been created a user, please login using that credentials.')
        ->assertExitCode(1);
});

it('does not allow admin user creation when passwords do not match', function () {
    $this->artisan('admin:create-user')
        ->expectsQuestion('Input Your Name:', 'Admin User')
        ->expectsQuestion('Input Your Email:', 'admin@gmail.com')
        ->expectsQuestion('Set Password:', 'password')
        ->expectsQuestion('Write your password again:', 'another_password')
        ->expectsOutput('Password mismatch')
        ->assertExitCode(1);
});

it('allows admin user to be created', function () {
    $this->artisan('admin:create-user')
        ->expectsQuestion('Input Your Name:', 'Admin User')
        ->expectsQuestion('Input Your Email:', 'admin@gmail.com')
        ->expectsQuestion('Set Password:', 'password')
        ->expectsQuestion('Write your password again:', 'password')
        ->expectsOutput('User has been created. Login using the given credentials.')
        ->assertExitCode(0);
});
