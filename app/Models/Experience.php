<?php

namespace App\Models;

use Database\Factories\ExperienceFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    /** @use HasFactory<ExperienceFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'company_name',
        'company_website',
        'start_date',
        'end_date',
        'description'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function workDuration(): Attribute
    {
        return new Attribute(
            get: fn(mixed $value) => $this->calculateWorkDuration()
        );
    }

    public function isCurrent(): bool
    {
        return is_null($this->end_date);
    }

    public function calculateWorkDuration()
    {
        $start = $this->start_date->format('M Y');
        $end = $this->end_date ? $this->end_date->format('M Y') : 'Present';

        return "$start - $end";
    }
}
