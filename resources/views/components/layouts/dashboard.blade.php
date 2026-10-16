<div class="flex items-start gap-8 pt-8 max-md:flex-col max-md:gap-5">
    <aside class="w-full shrink-0 md:sticky md:top-22 md:w-52">
        <p class="label-mono mb-3 px-3">Dashboard</p>
        <flux:navlist>
            <flux:navlist.item :href="route('dashboard')" icon="home" wire:navigate>{{ __('Overview') }}</flux:navlist.item>
            <flux:navlist.item :href="route('dashboard.blogs.index')" icon="pencil-square" wire:navigate>{{ __('Blogs') }}</flux:navlist.item>
            <flux:navlist.item :href="route('dashboard.projects.index')" icon="clipboard-document-list" wire:navigate>{{ __('Projects') }}</flux:navlist.item>
            <flux:navlist.item :href="route('dashboard.experiences.index')" icon="briefcase" wire:navigate>{{ __('Experiences') }}</flux:navlist.item>
            <flux:navlist.item :href="route('subscribers.index')" icon="chart-bar-square" wire:navigate>{{ __('Subscribers') }}</flux:navlist.item>
            <flux:navlist.item :href="route('contacts.index')" icon="users" wire:navigate>{{ __('Contacts') }}</flux:navlist.item>
        </flux:navlist>
    </aside>

    <flux:separator class="md:hidden" />

    <div class="w-full min-w-0 flex-1">
        {{ $slot }}
    </div>
</div>
