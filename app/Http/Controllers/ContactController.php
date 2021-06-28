<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        Contact::create($validatedData);

        session()->flash('success', 'We have received your message. We shall contact you very soon.');
        return redirect()->back();
    }
}
