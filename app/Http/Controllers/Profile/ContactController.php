<?php

namespace App\Http\Controllers\Profile;

use App\Models\Contact;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(20);

        return view('profile.contact.index', compact('contacts'));
    }
}
