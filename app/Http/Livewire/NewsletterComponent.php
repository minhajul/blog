<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;

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
            Subscriber::create([
                'email' => $this->email
            ]);

            $this->reset();

            // Send verification email
            session()->flash('success', 'Please check the email to verify.');
            return;
        }

        $this->reset();

        if ($subscriber->isVerified()) {

            session()->flash('success', 'You are already subscribed to our newsletter.');
            return;
        }

        // Send verification email eagain
        session()->flash('success', 'You are already subscribed please verify your email.');
    }

    public function render()
    {
        return view('livewire.newsletter-component');
    }
}
