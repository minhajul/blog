<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'details',
        'banner_path',
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

    // Accessor
    public function getShortDetailsAttribute(): string
    {
        return Str::limit(strip_tags($this->details), 200);
    }

    // Methods
    public function bannerUrl(): string
    {
        $banner = $this->banner_path;

        if (!empty($banner)) {
            return asset($banner);
        }

        return "https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80";
    }
}
