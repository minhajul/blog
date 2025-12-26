<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use App\Models\Contact;
use Livewire\Component;

final class ContactList extends Component
{
    public function render()
    {
        $contacts = Contact::query()->paginate(20);

        return view('livewire.dashboard.contact-list', compact('contacts'));
    }
}
