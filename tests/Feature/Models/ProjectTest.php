<?php

declare(strict_types=1);

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

describe('Project Model', function () {
    it('generates slug automatically from title', function () {
        $project = Project::factory()->create([
            'title' => 'My Awesome Project',
        ]);

        expect($project->slug)->toBe('my-awesome-project');
    });

    it('appends numeric suffix when slug already exists', function () {
        Project::factory()->create([
            'title' => 'Duplicate Project',
        ]);

        $project = Project::factory()->create([
            'title' => 'Duplicate Project',
        ]);

        expect($project->slug)->toBe('duplicate-project-2');
    });

    it('keeps incrementing slug suffix until unique', function () {
        Project::factory()->count(3)->create([
            'title' => 'Same Title',
        ]);

        $project = Project::factory()->create([
            'title' => 'Same Title',
        ]);

        expect($project->slug)->toBe('same-title-4');
    });

    it('casts technologies attribute to array', function () {
        $project = Project::factory()->create([
            'technologies' => ['Laravel', 'Vue', 'Docker'],
        ]);

        expect($project->technologies)
            ->toBeArray()
            ->toMatchArray(['Laravel', 'Vue', 'Docker']);
    });

    it('is soft deletable', function () {
        $project = Project::factory()->create();

        $project->delete();

        expect(Project::withTrashed()->find($project->id))
            ->not
            ->toBeNull()
            ->and(Project::find($project->id))
            ->toBeNull();
    });
});
