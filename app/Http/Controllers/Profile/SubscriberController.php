<?php

namespace App\Http\Controllers\Profile;

use App\Models\Subscriber;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::paginate(30);

        return view('profile.subscribers', compact('subscribers'));
    }
}
