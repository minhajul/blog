<?php

namespace App\Http\Controllers\Profile;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class SettingsController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('profile.setting', compact('setting'));
    }

    public function update(Request $request): RedirectResponse
    {
        $setting = Setting::first();

        $request['logo_path'] = $setting->logo_path ?? null;
        $request['favicon_path'] = $setting->favicon_path ?? null;

        if ($request->file('logo')) {
            $logoFileName = Str::random(5) . '.' . $request->file('logo')->extension();
            $request['logo_path'] = $request->file('logo')->storeAs('images', $logoFileName);
        }

        if ($request->file('favicon')) {
            $faviconFileName = Str::random(5) . '.' . $request->file('favicon')->extension();
            $request['favicon_path'] = $request->file('favicon')->storeAs('images', $faviconFileName);
        }

        $inputs = $request->only(
            'logo_path',
            'favicon_path',
            'site_title',
            'site_description',
            'view',
            'google_analytics_tracking_id',
            'google_analytics_view_id',
            'google_site_verification_code',
        );

        if ($setting) {
            $setting->update($inputs);
        } else {
            Setting::create($inputs);
        }

        session()->flash('success', 'Setting updated.');
        return redirect()->back();
    }
}
