<section class="bg-gradient-to-r bg-gray-800">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="relative flex flex-wrap items-center justify-center lg:justify-between">
            <div class="w-full py-5 lg:border-t lg:border-white lg:border-opacity-20">
                <div class="mx-auto">
                    <nav class="flex space-x-4">

                        <a href="{{ route('profile.index') }}" class="{{ request()->routeIs('profile.index') ? 'bg-gray-700 text-white' : 'text-gray-300' }} text-gray-300 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">
                            Profile
                        </a>

                        <a href="{{ route('profile.blogs') }}" class="{{ request()->routeIs('profile.blogs') ? 'bg-gray-700 text-white' : 'text-gray-300' }} px-3 py-2 rounded-md text-sm font-medium" aria-current="false">
                            Blogs
                        </a>

                        <a href="{{ route('subscribers.index') }}" class="{{ request()->routeIs('subscribers.index') ? 'bg-gray-700 text-white' : 'text-gray-300' }} px-3 py-2 rounded-md text-sm font-medium" aria-current="false">
                            Subscribers
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
