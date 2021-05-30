<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="text-black text-5xl md:text-15xl font-black">
                    503
                </div>

                <div class="w-16 h-1 bg-purple-light my-3 md:my-6"></div>

                <p class="text-grey-darker text-2xl md:text-3xl font-light mb-8 leading-normal">Sorry, the page you are
                    This may be because of a technical error we're working to fix. Try reloading the page.
                </p>

                <a href="{{ URL::current() }}" class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
                    Try Reloading
                </a>
                <br><br>
            </div>
        </div>
    </div>
</x-app-layout>
