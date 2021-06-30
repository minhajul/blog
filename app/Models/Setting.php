<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        "site_title",
        "site_description",
        "logo_path",
        "favicon_path",
        "google_site_verification_code",
        "google_analytics_tracking_id",
        "google_analytics_view_id"
    ];
}
