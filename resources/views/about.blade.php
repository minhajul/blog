<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center">
        <div class="py-6 overflow-hidden lg:py-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 items-center gap-14">
                <div class="col-span-1 lg:col-span-2">
                    <div class="text-center">
                        <x-typewriter
                            :phrases="['Hello, I am Minhaj 👋', 'A Full Stack Software Engineer!', 'DevOps Enthusiast!']"
                            class="text-surface text-2xl md:text-3xl font-bold mb-3 leading-tight"
                        />
                    </div>

                    <div class="mt-3 text-base lg:text-lg font-normal text-color sm:mt-5 leading-7">
                        {!! $user->bio !!}
                    </div>
                </div>

                <div class="col-span-1">
                    <img
                        src="{{ $user->avatarUrl() ?? 'https://placehold.co/500x300' }}"
                        alt="Avatar"
                        class="shrink-0 mx-auto rounded-md"
                        onerror="this.src='https://placehold.co/500x300'"
                    />

{{--                    <div class="border text-normal font-bold text-color text-sm p-2 mt-5 text-center">--}}
{{--                        Software & Application Lead at--}}
{{--                        <a href="https://genofax.com" target="_blank" rel="noreferrer" class="text-blue-400 font-extrabold">--}}
{{--                            Genofax--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
