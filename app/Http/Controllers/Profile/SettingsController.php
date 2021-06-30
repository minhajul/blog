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

        $logoPath = $setting->logo_path ?? null;
        $faviconPath = $setting->favicon_path ?? null;

        if ($request->file('logo')) {
            $logoFileName = Str::random(5) . '.' . $request->file('logo')->extension();
            $logoPath = $request->file('logo')->storeAs('images', $logoFileName);
        }

        if ($request->file('favicon')) {
            $faviconFileName = Str::random(5) . '.' . $request->file('favicon')->extension();
            $faviconPath = $request->file('favicon')->storeAs('images', $faviconFileName);
        }

        $inputs = [
            "logo_path" => $logoPath,
            "favicon_path" => $faviconPath,
            "site_title" => $request->input('site_title'),
            "site_description" => $request->input('site_description'),
            "google_analytics_tracking_id" => $request->input('google_analytics_tracking_id'),
            "google_analytics_view_id" => $request->input('google_analytics_view_id'),
            "google_site_verification_code" => $request->input('google_site_verification_code')
        ];

        if ($setting) {
            $setting->update($inputs);
        } else {
            Setting::create($inputs);
        }

        session()->flash('success', 'Setting updated.');
        return redirect()->back();
    }
}
