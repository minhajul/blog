<?php

namespace App\Http\Controllers\Profile;

use App\Exports\SubscriberExport;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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

    public function download(): BinaryFileResponse
    {
        $subscribers = Subscriber::all();

        return Excel::download(
            new SubscriberExport($subscribers),
            'subscribers.xlsx'
        );
    }
}
