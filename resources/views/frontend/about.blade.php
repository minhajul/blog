<x-layouts.app>
    <div class="py-6 lg:py-10">
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

                        <div class="border text-normal font-bold text-color text-sm p-2 mt-5 text-center">
                            Software Engineer at
                            <a href="" target="_blank" rel="noreferrer" class="text-blue-400 font-extrabold">
                                XYZ Company
                            </a>
                        </div>
                    </div>
                </div>

                <div class="py-10 mt-16">
                    <div class="text-center mb-16">
                        <h2 class="font-semibold text-color text-2xl lg:text-4xl mb-6">
                            Skills & Expertise
                        </h2>
                        <div class="h-1 w-32 bg-gradient-to-r from-blue-400 to-teal-600 mx-auto rounded-full"></div>
                        <p class="text-xl text-surface max-w-3xl mx-auto mt-5">
                            Technologies and tools I use to bring ideas to life
                        </p>
                    </div>

                    <div class="grid gap-6 sm:gap-7 md:gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach($skills as $skill)
                            <div
                                class="group will-reveal rounded-2xl p-4 bg-surface-muted ring-1 ring-white/10 backdrop-blur overflow-hidden">
                                <h3 class="text-lg font-semibold text-color">{{ $skill['title'] }}</h3>
                                <p class="text-xs text-surface">{{ $skill['description'] }}</p>

                                <div class="mt-5 flex flex-wrap gap-2">
                                    @foreach($skill['technologies'] as $technology)
                                        <span class="{{ $technology['colorCode'] }} px-2 py-1.5 rounded-full text-sm">
                                    {{ $technology['name'] }}
                                </span>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="max-w-full lg:max-w-2xl mx-auto text-center mt-10">
                        <p class="border border-blue-400 p-1 rounded-md text-surface">
                            Always learning and exploring new technologies
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
