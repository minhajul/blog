<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard\Profile;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

final class Password extends Component
{
    public $current_password;

    public $password;

    public $password_confirmation;

    protected $rules = [
        'current_password' => 'required',
        'password' => 'required|confirmed|min:6',
    ];

    public function mount()
    {
        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function update(): RedirectResponse
    {
        $this->validate();

        $user = User::find(auth()->id());

        if (! Hash::check($this->current_password, $user->password)) {
            $this->reset();
            session()->flash('error', 'Your current password is wrong!');

            return redirect()->back();
        }

        $user->update([
            'password' => $this->password,
        ]);

        $this->reset();

        session()->flash('success', 'You have changed your password!');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.dashboard.profile.password');
    }
}
