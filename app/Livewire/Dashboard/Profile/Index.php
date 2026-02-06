<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard\Profile;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

final class Index extends Component
{
    use WithFileUploads;

    #[Validate('required|string|max:255')]
    public string $name = '';

    public string $email = '';

    #[Validate('nullable|string|max:1000')]
    public ?string $bio = null;

    #[Validate('nullable|image|max:2048')]
    public ?TemporaryUploadedFile $avatar = null;

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

        $validated = $this->validate();

        if ($this->avatar) {
            if ($user->avatar_url && Storage::disk('public')->exists($user->avatar_url)) {
                Storage::disk('public')->delete($user->avatar_url);
            }

            $fileName = $this->generateAvatarFileName($user->name, $this->avatar->extension());
            $validated['avatar_url'] = $this->avatar->storeAs('avatars', $fileName, 'public');
        }

        $user->update($validated);

        session()->flash('success', 'Profile updated.');
    }

    public function render()
    {
        return view('livewire.dashboard.profile.index');
    }

    protected function rules(): array
    {
        return [
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->id())],
        ];
    }

    private function generateAvatarFileName(string $userName, string $extension): string
    {
        $slug = Str::slug($userName);
        $randomString = Str::random(8);
        $timestamp = now()->timestamp;

        return "{$slug}-{$timestamp}-{$randomString}.{$extension}";
    }
}
