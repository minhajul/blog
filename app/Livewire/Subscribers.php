<?php

namespace App\Livewire;

use App\Models\Subscriber;
use Livewire\Component;

class Subscribers extends Component
{
    public function delete(Subscriber $subscriber)
    {
        $subscriber->delete();

        session()->flash('success', 'The subscriber has been deleted');

        return redirect()->back();
    }

    public function render()
    {
        $subscribers = Subscriber::paginate(30);

        return view('livewire.subscribers', compact('subscribers'));
    }
}
