<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

final class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::factory()
            ->current()
            ->create([
                'title' => 'Senior Full Stack Developer',
                'company_name' => 'Tech Solutions Inc.',
                'start_date' => '2023-01-01',
            ]);

        Experience::factory()
            ->count(3)
            ->create();

        Experience::factory()->create([
            'title' => 'Junior Developer',
            'company_name' => 'Old Startup LLC',
            'start_date' => '2018-01-01',
            'end_date' => '2020-12-31',
        ]);
    }
}
