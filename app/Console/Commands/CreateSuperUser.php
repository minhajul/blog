<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateSuperUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:super-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create super user';

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
    public function handle()
    {
        $name = $this->ask('Input Your Name:');

        $email = $this->ask('Input Your Email:');

        $password = $this->secret('Set Password:');
        $password_confirmation = $this->secret('Write your password again:');

        if ($password !== $password_confirmation) {
            $this->error('Password mismatch');
            return;
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' =>  $password
        ]);

        $this->info('User has been created.');
    }
}
