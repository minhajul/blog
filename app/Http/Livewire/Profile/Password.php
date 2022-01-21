<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\RedirectResponse;

class Password extends Component
{
    public $current_password, $password, $password_confirmation;

    public function mount()
    {
        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    protected $rules = [
        'current_password' => 'required',
        'password' => 'required|confirmed|min:6',
    ];

    public function update(): RedirectResponse
    {
        $this->validate();

        $user = User::find(auth()->id());

        if (!\Hash::check($this->current_password, $user->password)) {
            $this->reset();
            session()->flash('error', 'Your current password is wrong!');
            return redirect()->back();
        }

        $user->update([
            'password' => $this->password
        ]);

        $this->reset();

        session()->flash('success', 'You have changed your password!');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.profile.password');
    }
}