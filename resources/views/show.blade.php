<x-app-layout>
    <div class="py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
        <div class="relative max-w-3xl mx-auto">
            <div class="mt-5">
                <div class="relative px-4 sm:px-6 lg:px-8">
                    <div class="text-lg max-w-prose mx-auto">
                        <h2 class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-slate-800 dark:text-slate-400 sm:text-4xl">
                            {{ $blog->title }}
                        </h2>
                    </div>

                    <div class="mt-6 prose prose-indigo prose-lg text-slate-500 dark:text-slate-400 mx-auto">
                        {!! $blog->details !!}
                    </div>

                    <div class="mt-10">
                        <a href="{{ route('home') }}" class="bg-gradient-to-r from-blue-600 to-indigo-500 rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2">
                            Back to Blog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
