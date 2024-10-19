<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SubscriberController extends Controller
{
    public function index(): View
    {
        $subscribers = Subscriber::paginate(30);

        return view('profile.subscribers', compact('subscribers'));
    }

    public function delete(Subscriber $subscriber): RedirectResponse
    {
        $subscriber->delete();

        session()->flash('success', 'The subscriber has been deleted');

        return redirect()->back();
    }
}
