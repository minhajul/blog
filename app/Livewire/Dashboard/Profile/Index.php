<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard\Profile;

use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

final class Index extends Component
{
    use WithFileUploads;

    #[Validate('required|string')]
    public string $name = '';

    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $bio = '';

    public $avatar;

    public function mount(): void
    {
        $user = auth()->user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->bio = $user->bio;
    }

    public function save()
    {
        $user = auth()->user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string'],
        ]);

        $validated['avatar_url'] = $user->avatar_url;

        if (! is_null($this->avatar)) {
            $file_name = $user->name.'-'.Str::random(5).'.'.$this->avatar->extension();
            $validated['avatar_url'] = $this->avatar->storeAs('avatar', $file_name);
        }

        $user->update($validated);

        session()->flash('success', 'Profile updated.');
    }

    public function render()
    {
        return view('livewire.dashboard.profile.index');
    }
}
