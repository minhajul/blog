<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
use App\Mail\SubscriberConfirmation;

class NewsletterComponent extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email'
    ];

    public function subscribe()
    {
        $this->validate();

        $subscriber = Subscriber::whereEmail($this->email)->first();

        if (!$subscriber) {
            $subscriber = Subscriber::create([
                'email' => $this->email
            ]);

            \Mail::to($subscriber->email)
                ->send(new SubscriberConfirmation($subscriber));

            $this->reset();
            session()->flash('success', 'Please check the email to verify.');
            return;
        }

        $this->reset();

        if ($subscriber->isVerified()) {
            session()->flash('success', 'You are already subscribed to our newsletter.');
            return;
        }

        \Mail::to($subscriber->email)
            ->send(new SubscriberConfirmation($subscriber));

        session()->flash('success', 'You are already subscribed please verify your email.');
    }

    public function render()
    {
        return view('livewire.newsletter-component');
    }
}
