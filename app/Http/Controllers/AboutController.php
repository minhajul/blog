<?php

namespace App\Http\Controllers;

use App\Models\User;

class AboutController extends Controller
{
    public function index()
    {
        $user = User::first();

        return view('about', compact('user'));
    }
}
