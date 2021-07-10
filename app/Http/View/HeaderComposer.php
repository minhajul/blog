<?php

namespace App\Http\View;

use App\Models\Setting;
use Illuminate\View\View;

class HeaderComposer
{
    public function compose(View $view)
    {
        $setting = Setting::first();

        $view->with('setting', $setting);
    }
}
