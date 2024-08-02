<?php

namespace App\Enums;

enum BlogStatus: string
{
    case PUBLISHED = 'published';
    case DRAFTED = 'drafted';
    case ARCHIVED = 'archived';

    public function label(): string
    {
        return match ($this) {
            self::PUBLISHED => 'Published',
            self::DRAFTED => 'Drafted',
            self::ARCHIVED => 'Archived'
        };
    }
}
