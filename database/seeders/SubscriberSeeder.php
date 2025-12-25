<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Subscriber;
use Illuminate\Database\Seeder;

final class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subscriber::factory(100)->create();
    }
}
