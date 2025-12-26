<section class="bg-gradient-to-r bg-slate-800">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl">
        <div class="relative flex flex-wrap items-center justify-center lg:justify-between">
            <div class="w-full py-5">
                <div class="mx-auto">
                    <nav class="flex space-x-4 lg:overflow-auto overflow-x-auto">
                        <flux:navbar>
                            <flux:navbar.item href="{{ route('profile.index') }}" wire:navigate>Profile</flux:navbar.item>
                            <flux:navbar.item href="{{ route('profile.blogs.index') }}" wire:navigate>Blogs</flux:navbar.item>
                            <flux:navbar.item href="{{ route('profile.gallery.index') }}" wire:navigate>Gallery</flux:navbar.item>
                            <flux:navbar.item href="{{ route('subscribers.index') }}" wire:navigate>Subscribers</flux:navbar.item>
                            <flux:navbar.item href="{{ route('settings.index') }}" wire:navigate>Settings</flux:navbar.item>
                            <flux:navbar.item href="{{ route('profile.contacts') }}" wire:navigate>Contacts</flux:navbar.item>
                        </flux:navbar>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
