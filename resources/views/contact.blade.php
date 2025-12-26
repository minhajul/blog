<x-layouts.app>
    <div class="py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
        <div class="relative max-w-xl mx-auto">
            <div class="text-center">
                <h2 x-intersect="$el.classList.add('fadeInUp')" class="text-3xl font-extrabold tracking-tight text-color sm:text-4xl">
                    Contact Us
                </h2>
                <p x-intersect="$el.classList.add('fadeInUp')"
                   class="mt-4 text-lg leading-6 text-color">
                    Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor
                    lacus arcu.
                </p>
            </div>

            <div class="mt-12" x-intersect="$el.classList.add('fadeInUp')">
                @include('errors.success')
                <form action="{{ route('contact.store') }}" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    @csrf
                    <div class="sm:col-span-2">
                        <flux:input
                            type="text"
                            name="name"
                            label="Name"
                            value="{{ old('name') }}"
                            autocomplete="name"
                            required="true"
                        />
                    </div>

                    <div class="sm:col-span-2">
                        <flux:input
                            type="email"
                            name="email"
                            label="Email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required="true"
                        />
                    </div>

                    <div class="sm:col-span-2">
                        <flux:textarea
                            label="Message"
                            name="message"
                            rows="4"
                            required="true"
                            values="{{ old('email') }}"
                        />
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
</x-layouts.app>
