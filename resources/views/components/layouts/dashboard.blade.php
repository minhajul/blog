<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px] flex-shrink-0">
        <flux:navlist>
            <flux:navlist.item :href="route('dashboard')" icon="home" wire:navigate>{{ __('Home') }}</flux:navlist.item>
            <flux:navlist.item :href="route('dashboard.blogs.index')" icon="chart-bar-square" wire:navigate>{{ __('Blogs') }}</flux:navlist.item>
            <flux:navlist.item :href="route('gallery.index')" icon="users" wire:navigate>{{ __('Gallery') }}</flux:navlist.item>
            <flux:navlist.item :href="route('subscribers.index')" icon="cube" wire:navigate>{{ __('Subscribers') }}</flux:navlist.item>
            <flux:navlist.item :href="route('contacts.index')" icon="cog-6-tooth" wire:navigate>{{ __('Contacts') }}</flux:navlist.item>
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6 min-w-0">
        <div class="w-full overflow-hidden rounded-md shadow-md bg-gray-100 px-6">
            {{ $slot }}
        </div>
    </div>
</div>
