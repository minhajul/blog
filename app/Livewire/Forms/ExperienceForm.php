<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\Models\Experience;
use Livewire\Attributes\Validate;
use Livewire\Form;

final class ExperienceForm extends Form
{
    public ?Experience $experience = null;

    #[Validate('required|string')]
    public $title;

    #[Validate('required|string')]
    public $company_name;

    #[Validate('required|url')]
    public $company_website;

    #[Validate('required|date')]
    public $start_date;

    #[Validate('nullable|date|after:start_date')]
    public $end_date;

    #[Validate('required|string')]
    public $description;

    public $current = false;

    public function setExperience(Experience $experience): void
    {
        $this->experience = $experience;

        $this->title = $experience->title;
        $this->company_name = $experience->company_name;
        $this->company_website = $experience->company_website;
        $this->start_date = $experience->start_date;
        $this->end_date = $experience->end_date;
        $this->description = $experience->description;

        $this->start_date = $experience->start_date->format('Y-m-d');
        $this->end_date = $experience->end_date?->format('Y-m-d');

        $this->current = is_null($experience->end_date);
    }

    public function save()
    {
        $this->validate();

        $data = $this->all();

        if ($this->current) {
            $data['end_date'] = null;
        }

        if ($this->experience) {
            $this->experience->update($data);
        } else {
            Experience::create($data);
        }

        $this->reset('title', 'company_name', 'company_website', 'start_date', 'end_date', 'description');
    }
}
