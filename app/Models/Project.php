<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

final class Project extends Model
{
    /** @use HasFactory<ProjectFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'url',
        'technologies',
        'description',
    ];

    protected $casts = [
        'technologies' => 'array',
    ];

    protected $appends = [
        'short_description',
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($table) {
            $slug = Str::slug($table->title);

            if (static::whereSlug($slug)->exists()) {
                $original = $slug;
                $count = 2;

                while (static::whereSlug($slug)->exists()) {
                    $slug = "$original-".$count++;
                }
            }

            $table->slug = $slug;
        });
    }

    // Accessor
    protected function shortDescription(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Str::limit(strip_tags($attributes['description']), 200)
        );
    }
}
