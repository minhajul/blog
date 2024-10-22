<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Password;

class RecoverAdminAccess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:recover-access';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recover admin access if you can not remember the password.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $email = $this->ask('Input Your Email:');

        if (!User::whereEmail($email)->exists()) {
            $this->error('No user found with the given email.');

            return self::FAILURE;
        }

        Password::sendResetLink([
            'email' => $email,
        ]);

        $this->info('Password reset link has been sent to your given email.');

        return self::SUCCESS;
    }
}
