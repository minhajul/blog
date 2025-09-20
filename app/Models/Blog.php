<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property-read string $short_details
 */
class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'status',
        'details',
        'banner_path',
        'hit_count',
    ];

    protected $appends = [
        'short_details',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($table) {
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
    protected function shortDetails(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Str::limit(strip_tags($attributes['details']), 200)
        );
    }

    // Methods
    public function bannerUrl(): string
    {
        $banner = $this->banner_path;

        if (! empty($banner)) {
            return asset($banner);
        }

        return 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80';
    }

    public function isPublished(): bool
    {
        return $this->status == 'published';
    }

    public function isDrafted(): bool
    {
        return $this->status == 'drafted';
    }

    public function isArchived(): bool
    {
        return $this->status == 'archived';
    }

    public function markAsArchived()
    {
        $this->update(['status' => 'archived']);
    }
}
