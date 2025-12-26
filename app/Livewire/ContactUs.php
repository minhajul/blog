<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\Validate;
use Livewire\Component;

final class ContactUs extends Component
{
    #[Validate('required|string')]
    public $name = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required|string')]
    public $message = '';

    public function submit()
    {
        $validatedData = $this->validate();

        Contact::create($validatedData);

        session()->flash('success', 'We have received your message. We shall contact you very soon.');

        return $this->redirect(route('contact.index'));
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
