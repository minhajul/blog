<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
use App\Mail\SubscriberConfirmation;

class Newsletter extends Component
{
    public $email_address;

    protected $rules = [
        'email_address' => 'required|email'
    ];

    public function subscribe()
    {
        $this->validate();

        $subscriber = Subscriber::whereEmail($this->email_address)->first();

        if (!$subscriber) {
            $subscriber = Subscriber::create([
                'email' => $this->email_address
            ]);

            \Mail::to($subscriber->email)
                ->send(new SubscriberConfirmation($subscriber));

            $this->reset();
            session()->flash('message', 'Please check the email to verify.');
            return;
        }

        $this->reset();

        if ($subscriber->isVerified()) {
            session()->flash('message', 'You are already subscribed to our newsletter.');
            return;
        }

        \Mail::to($subscriber->email)
            ->send(new SubscriberConfirmation($subscriber));

        session()->flash('message', 'You are already subscribed please verify your email.');
    }

    public function render()
    {
        return view('livewire.newsletter');
    }
}
