<x-layouts.dashboard>
    <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8 py-4">
        <div class="grid grid-cols-1 gap-4 lg:col-span-3">
            <section aria-labelledby="profile-overview-title">
                <div class="rounded-md bg-color overflow-hidden shadow">
                    <div class="bg-color p-6">
                        <div class="sm:flex sm:items-center sm:justify-between">
                            <div class="sm:flex sm:space-x-5">
                                <div class="shrink-0">
                                    <div class="bg-gradient-to-r from-blue-400 to-purple-600 rounded-full overflow-hidden shadow-lg">
                                        <img src="{{ $user->avatarUrl() }}" alt="Admin Account" class="h-20 w-20 shrink-0 rounded-full md:h-32 md:w-32 p-2">
                                    </div>
                                </div>
                                <div class="mt-8 text-center sm:pt-1 sm:text-left">
                                    <p class="text-xl font-bold text-color sm:text-2xl">
                                        {{ $user->name }}
                                    </p>
                                    <p class="text-sm font-medium text-color">
                                        Logged in as {{ $user->email }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 bg-color grid grid-cols-1 divide-y divide-gray-200 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">
                        <div class="px-6 py-5 text-sm font-medium text-center">
                            <span class="text-color">{{ $analytics['posted_blog'] }}</span>
                            <span class="text-color">Blogs posted</span>
                        </div>

                        <div class="px-6 py-5 text-sm font-medium text-center">
                            <span class="text-color">{{ $analytics['total_published_blog'] }}</span>
                            <span class="text-color">Published Blogs</span>
                        </div>

                        <div class="px-6 py-5 text-sm font-medium text-center">
                            <span class="text-color">{{ $analytics['total_hit_count'] }}</span>
                            <span class="text-color">Blog viewed</span>
                        </div>
                    </div>
                </div>
            </section>

            @include('errors.error')
            @include('errors.success')
            @include('errors.message')

            <livewire:dashboard.profile.index/>

            <div class="py-4">
                <flux:separator />
            </div>

            <div class="mt-10 sm:mt-0">
                <div class="xsm:p-4 md:col-span-2">
                    <livewire:dashboard.profile.password/>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
