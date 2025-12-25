<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

final class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::factory(50)->create();
    }
}
