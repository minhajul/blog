<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Livewire\Component;

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

        $this->reset();

        if (!$subscriber) {
            Subscriber::create([
                'email' => $this->email
            ]);

            // Send verification email
            session()->flash('success', 'Please check the email to verify your subscription.');
            return;
        }

        if ($subscriber->isVerified()) {
            session()->flash('success', 'You are already subscribed to our newsletter.');
            return;
        }

        // Send verification email eagain
        session()->flash('success', 'You are already subscribed but did not verified your email. Please check the email to verify.');

    }

    public function render()
    {
        return view('livewire.newsletter-component');
    }
}
