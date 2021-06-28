<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConsoleCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_anonymous_user_can_not_ask_for_password_reset_email()
    {
        $this->artisan('admin:recover-access')
            ->expectsQuestion('Input Your Email:', 'test@email.com')
            ->expectsOutput('No user found with the given email.')
            ->assertExitCode(0);
    }

    public function test_admin_user_can_ask_for_password_reset_email()
    {
        Mail::fake();

        $user = User::factory()->create();

        $this->artisan('admin:recover-access')
            ->expectsQuestion('Input Your Email:', $user->email)
            ->expectsOutput('Password reset link has been sent to your given email.')
            ->assertExitCode(0);
    }

    public function test_admin_user_can_not_be_created_if_user_exists()
    {
        User::factory()->create();

        $this->artisan('admin:create-user')
            ->expectsOutput('You have already been created a user, please login using that credentials.')
            ->assertExitCode(0);
    }

    public function test_admin_user_can_not_be_created_with_wrong_password()
    {
        $this->artisan('admin:create-user')
            ->expectsQuestion('Input Your Name:', 'Admin User')
            ->expectsQuestion('Input Your Email:', 'admin@gmail.com')
            ->expectsQuestion('Set Password:', 'password')
            ->expectsQuestion('Write your password again:', 'another_password')
            ->expectsOutput('Password mismatch')
            ->assertExitCode(0);
    }

    public function test_admin_user_can_be_created()
    {
        $this->artisan('admin:create-user')
            ->expectsQuestion('Input Your Name:', 'Admin User')
            ->expectsQuestion('Input Your Email:', 'admin@gmail.com')
            ->expectsQuestion('Set Password:', 'password')
            ->expectsQuestion('Write your password again:', 'password')
            ->expectsOutput('User has been created. Login using the given credentials.')
            ->assertExitCode(0);
    }
}
