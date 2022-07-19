<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_title',
        'site_description',
        'logo_path',
        'favicon_path',
        'view',
        'google_site_verification_code',
        'google_analytics_tracking_id',
        'google_analytics_view_id',
    ];

    // Methods
    public function logoUrl(): string
    {
        if (! empty($this->logo_path)) {
            return asset($this->logo_path);
        }

        return 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80';
    }

    // Methods
    public function faviconUrl(): string
    {
        if (! empty($this->favicon_path)) {
            return asset($this->favicon_path);
        }

        return 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80';
    }
}
