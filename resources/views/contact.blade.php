<x-app-layout>
    <div class="py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
        <div class="relative max-w-xl mx-auto">
            <div class="text-center">
                <h2 x-intersect="$el.classList.add('fadeInUp')" class="text-3xl font-extrabold tracking-tight text-slate-800 dark:text-slate-400 sm:text-4xl">
                    Contact Us
                </h2>
                <p x-intersect="$el.classList.add('fadeInUp')"
                   class="mt-4 text-lg leading-6 text-slate-500 dark:text-slate-400">
                    Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor
                    lacus arcu.
                </p>
            </div>

            <div class="mt-12" x-intersect="$el.classList.add('fadeInUp')">
                @include('errors.success')
                <form action="{{ route('contact.store') }}" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    @csrf
                    <div class="sm:col-span-2">
                        <label for="name" class="block text-sm font-medium text-slate-400">Name</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name" value="{{ old('name') }}" autocomplete="name" class="py-2 px-4 block w-full text-sm text-slate-500 shadow-sm bg-transparent focus:ring-gray-500 focus:border-gray-500 border-gray-500 rounded-md">
                            @error('name')<span class="text-red-500 text-sm italic">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="email" class="block text-sm font-medium text-slate-400">Email</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" class="py-2 px-4 block w-full text-sm text-slate-500 shadow-sm bg-transparent focus:ring-gray-500 focus:border-gray-500 border-gray-500 rounded-md">
                            @error('email')<span class="text-red-500 text-sm italic">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="message" class="block text-sm font-medium text-slate-400">Message</label>
                        <div class="mt-1">
                            <textarea id="message" name="message" rows="4" class="py-1 px-4 block w-full text-sm text-slate-500 shadow-sm bg-transparent focus:ring-gray-500 focus:border-gray-500 border-gray-500 rounded-md">{{ old('email') }}</textarea>
                            @error('message')<span class="text-red-500 text-sm italic">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-500 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white focus:outline-none">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
