<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

final class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::factory(20)->create();
    }
}
