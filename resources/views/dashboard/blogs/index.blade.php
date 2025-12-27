<x-layouts.app>
    <x-layouts.dashboard>
        <div class="py-4 max-w-3xl mx-auto lg:max-w-7xl">
            <div class="flex justify-between">
                <flux:heading size="xl">Posted Blogs</flux:heading>

                <flux:button href="{{ route('dashboard.blogs.create') }}">Create</flux:button>
            </div>
            <livewire:dashboard.blog-list/>
        </div>
    </x-layouts.dashboard>
</x-layouts.app>
