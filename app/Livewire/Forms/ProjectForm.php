<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\Models\Project;
use Livewire\Form;

final class ProjectForm extends Form
{
    public $title;

    public $url;

    public $technologies;

    public $description;

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'url' => 'required|url',
            'technologies' => 'required|string',
            'description' => 'required|string',
        ];
    }

    public function save()
    {
        $validatedData = $this->validate();

        $validatedData['technologies'] = array_map('trim', explode(',', $this->technologies));

        Project::create($validatedData);

        $this->reset();
    }
}
