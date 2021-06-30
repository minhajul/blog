<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index()
    {
        return view('profile.setting');
    }
}
