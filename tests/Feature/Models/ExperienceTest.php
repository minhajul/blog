<?php

declare(strict_types=1);

use App\Models\Experience;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);

describe('Experience Model', function () {
    it('casts start_date and end_date as date objects', function () {
        $experience = Experience::factory()->create([
            'start_date' => '2022-01-01',
            'end_date' => '2023-01-01',
        ]);

        expect($experience->start_date)->toBeInstanceOf(Carbon::class)
            ->and($experience->end_date)->toBeInstanceOf(Carbon::class);
    });

    it('determines current experience correctly', function () {
        $current = Experience::factory()->make([
            'end_date' => null
        ]);

        $past = Experience::factory()->make([
            'end_date' => now()->subYear()
        ]);

        expect($current->isCurrent())->toBeTrue()
            ->and($past->isCurrent())->toBeFalse();
    });

    it('calculates work duration for current experience', function () {
        Carbon::setTestNow('2024-06-01');

        $experience = Experience::factory()->make([
            'start_date' => Carbon::parse('2021-02-01'),
            'end_date' => null
        ]);

        expect($experience->calculateWorkDuration())
            ->toBe('Feb 2021 - Present');
    });

    it('calculates work duration for completed experience', function () {
        $experience = Experience::factory()->make([
            'start_date' => Carbon::parse('2019-03-01'),
            'end_date' => Carbon::parse('2022-08-01')
        ]);

        expect($experience->calculateWorkDuration())
            ->toBe('Mar 2019 - Aug 2022');
    });

    it('exposes work duration via accessor', function () {
        $experience = Experience::factory()->make([
            'start_date' => Carbon::parse('2020-01-01'),
            'end_date' => Carbon::parse('2021-01-01')
        ]);

        expect($experience->workDuration)
            ->toBe('Jan 2020 - Jan 2021');
    });
});
