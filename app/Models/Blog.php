<?php

namespace App\Models;

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

    public function getShortDetailsAttribute(): string
    {
        return Str::limit($this->details, 200);
    }
}
