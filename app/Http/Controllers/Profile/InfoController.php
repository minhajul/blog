<?php

declare(strict_types=1);

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\View\View;

final class InfoController extends Controller
{
    public function contacts(): View
    {
        $contacts = Contact::query()->paginate(20);

        return view('profile.contact.index', compact('contacts'));
    }
}
