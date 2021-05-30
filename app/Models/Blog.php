<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'details',
        'hit_count'
    ];

    protected $appends = ['short_details'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($table) {
            $slug = Str::slug($table->title);

            if (static::whereSlug($slug)->exists()) {
                $original = $slug;
                $count = 2;

                while (static::whereSlug($slug)->exists()) {
                    $slug = "{$original}-" . $count++;
                }
            }

            $table->slug = $slug;
        });
    }

    // Scopes
    public function scopePublished(Builder $builder): Builder
    {
        return $builder->where('status', 'published');
    }

    public function scopeDrafted(Builder $builder): Builder
    {
        return $builder->where('status', 'drafted');
    }

    public function scopeArchived(Builder $builder): Builder
    {
        return $builder->where('status', 'archived');
    }

    public function getShortDetailsAttribute(): string
    {
        return Str::limit($this->details, 200);
    }
}
