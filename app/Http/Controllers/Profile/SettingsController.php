<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function index(): View
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
            $logoFileName = Str::random(5).'.'.$request->file('logo')->extension();
            $request['logo_path'] = $request->file('logo')->storeAs('images', $logoFileName);
        }

        if ($request->file('favicon')) {
            $faviconFileName = Str::random(5).'.'.$request->file('favicon')->extension();
            $request['favicon_path'] = $request->file('favicon')->storeAs('images', $faviconFileName);
        }

        $inputs = $request->only(
            'site_name',
            'site_title',
            'site_description',
            'logo_path',
            'favicon_path',
            'view',
            'google_analytics_tracking_id',
            'google_analytics_view_id',
            'google_site_verification_code',
        );

        $setting ? $setting->update($inputs) : Setting::create($inputs);

        session()->flash('success', 'Setting updated.');

        return redirect()->back();
    }
}
