<?php

namespace App\Http\Controllers\Profile;

use App\Exports\SubscriberExport;
use App\Models\Subscriber;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::paginate(30);

        return view('profile.subscribers', compact('subscribers'));
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
