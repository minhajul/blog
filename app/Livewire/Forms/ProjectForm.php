<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\Models\Project;
use Livewire\Attributes\Validate;
use Livewire\Form;

final class ProjectForm extends Form
{
    public ?Project $project = null;

    #[Validate('required|string')]
    public $title;

    #[Validate('required|url')]
    public $url;

    #[Validate('required|string')]
    public $technologies;

    #[Validate('required|string')]
    public $description;

    public function setProject(Project $project): void
    {
        $this->project = $project;

        $this->title = $project->title;
        $this->url = $project->url;
        $this->description = $project->description;

        $this->technologies = implode(', ', $project->technologies ?? []);
    }

    public function save()
    {
        $validatedData = $this->validate();

        $validatedData['technologies'] = array_map('trim', explode(',', $this->technologies));

        if ($this->project) {
            $this->project->update($validatedData);
        } else {
            Project::create($validatedData);
        }

        $this->reset('title', 'url', 'technologies', 'description');
    }
}
