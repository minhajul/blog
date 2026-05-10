<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Mail\SubscriberConfirmation;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;

final class Newsletter extends Component
{
    #[Validate('required|email')]
    public $email_address;

    public function subscribe()
    {
        $this->validate();

        $subscriber = Subscriber::firstOrCreate(
            ['email' => $this->email_address],
            ['email' => $this->email_address]
        );

        $this->reset();

        if ($subscriber->wasRecentlyCreated) {
            $this->sendConfirmationEmail($subscriber);
            session()->flash('message', 'Please check the email to verify.');

            return;
        }

        if ($subscriber->isVerified()) {
            session()->flash('message', 'You are already subscribed to our newsletter.');

            return;
        }

        $this->sendConfirmationEmail($subscriber);
        session()->flash('message', 'You are already subscribed, please verify your email.');
    }

    public function render()
    {
        return view('livewire.newsletter');
    }

    protected function sendConfirmationEmail($subscriber)
    {
        Mail::to($subscriber->email)
            ->queue(new SubscriberConfirmation($subscriber));
    }
}
