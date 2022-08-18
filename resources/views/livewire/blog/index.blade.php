<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 lg:py-10">

    @include('livewire.partials.blog-search')

    <div class="mt-12 max-w-lg mx-auto lg:max-w-none">
        @include("livewire.blog._$viewStyle")
    </div>

    <div class="py-5 text-gray-500 text-center">

        @if($blogs->hasPages())
        <button  wire:click="loadMore" wire:loading.class="from-gray-400 to-gray-500 disabled:opacity-50" wire:loading.class.remove="from-blue-600 to-indigo-500" class="cursor-pointer bg-gradient-to-r from-blue-600 to-indigo-500 border border-transparent rounded-md py-2 px-4 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500">
            <div wire:loading.remove>Load More</div>

            <div wire:loading wire:target="loadMore">Loading....</div>
        </button>
        @endif
    </div>
</div>

