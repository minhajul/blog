<x-app-layout>
    <div class="py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
        <div class="relative max-w-4xl mx-auto">
            <div class="p-6 flex items-center justify-center min-h-screen">
                <div class="md:flex">
                    <div class="h-24 md:h-32 bg-gradient-to-r from-blue-400 to-purple-600 rounded-full overflow-hidden shadow-lg">
                        <img x-intersect="$el.classList.add('scale')"
                             src="{{ $user->avatarUrl() ?? "https://via.placeholder.com/150x150" }}"
                             alt="Avatar" class="h-24 w-24 shrink-0 rounded-full md:h-32 md:w-32 p-2"
                             onerror="this.src='/images/default-avatar.png'"
                        >
                    </div>

                    <div class="mt-6 md:ml-6 md:mt-0">
                        <div class="text-5xl font-bold">
                          <span x-intersect="$el.classList.add('fadeInUp')" class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500">
                                {{ $user->name ?? 'Set your name from panel' }}
                          </span>
                        </div>

                        <div class="mt-6 max-w-2xl">
                            <div class="markdown">
                                <div x-intersect="$el.classList.add('fadeInUp')" class="mb-3 text-slate-800 dark:text-slate-400">
                                    @if($user)
                                        {!! $user->bio !!}
                                    @else
                                        What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry Lorem Ipsum has been the industry's standard dummy text
                                        ever since the 1500s when an unknown printer took a galley of type and scrambled
                                        it to make a type specimen book it has?
                                        <br><br>
                                        What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry Lorem Ipsum has been the industry's standard dummy text
                                        ever since the 1500s when an unknown printer took a galley of type and scrambled
                                        it to make a type specimen book it has?
                                        <br><br>
                                        What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry Lorem Ipsum has been the industry's standard dummy text
                                        ever since the 1500s when an unknown printer took a galley of type and scrambled
                                        it to make a type specimen book it has?
                                        <br><br>
                                        What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry Lorem Ipsum has been the industry's standard dummy text
                                        ever since the 1500s when an unknown printer took a galley of type and scrambled
                                        it to make a type specimen book it has?
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
