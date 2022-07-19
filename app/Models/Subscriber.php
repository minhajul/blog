<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'verified_at',
    ];

    // Scope
    public function scopeVerified(Builder $builder): Builder
    {
        return $builder->where('verified_at', '!=', null);
    }

    // Methods
    public function isVerified(): bool
    {
        return $this->verified_at != null;
    }

    public function status(): string
    {
        return $this->isVerified() ? 'Verified' : 'Not Verified';
    }

    public function markAsVerified()
    {
        $this->update([
            'verified_at' => now(),
        ]);
    }
}
