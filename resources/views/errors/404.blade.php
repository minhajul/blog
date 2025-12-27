<x-layouts.app>
    <div class="py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden pb-6">
                <h2 class="text-gray-400 text-5xl md:text-15xl font-black">
                    404
                </h2>

                <div class="w-16 h-1 bg-gray-500 my-3 md:my-6"></div>

                <p class="text-gray-500 text-2xl md:text-3xl font-light mb-8 leading-normal">
                    Sorry, the page you are looking for could not be found.
                </p>
                <a href="{{ URL::current() }}" class="bg-transparent text-gray-500 font-bold uppercase tracking-wide py-3 px-6 border-2 border-gray-500 hover:border-gray-500 rounded-lg">
                    Try Reloading
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
