<section class="bg-gradient-to-r bg-slate-800">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl">
        <div class="relative flex flex-wrap items-center justify-center lg:justify-between">
            <div class="w-full py-5 lg:border-t lg:border-white lg:border-opacity-20">
                <div class="mx-auto">
                    <nav class="flex space-x-4 lg:overflow-auto overflow-x-auto">

                        <a href="{{ route('profile.index') }}" class="{{ request()->routeIs('profile.index') ? 'bg-slate-900 text-white' : 'text-slate-300' }} px-3 py-2 rounded-md text-sm font-medium" aria-current="page">
                            Profile
                        </a>

                        <a href="{{ route('profile.blogs') }}" class="{{ request()->routeIs('profile.blogs') ? 'bg-slate-900 text-white' : 'text-slate-300' }} px-3 py-2 rounded-md text-sm font-medium" aria-current="false">
                            Blogs
                        </a>

                        <a href="{{ route('profile.gallery.index') }}" class="{{ request()->routeIs('profile.gallery.index') ? 'bg-slate-900 text-white' : 'text-slate-300' }} px-3 py-2 rounded-md text-sm font-medium" aria-current="false">
                            Gallery
                        </a>

                        <a href="{{ route('subscribers.index') }}" class="{{ request()->routeIs('subscribers.index') ? 'bg-slate-900 text-white' : 'text-slate-300' }} px-3 py-2 rounded-md text-sm font-medium" aria-current="false">
                            Subscribers
                        </a>

                        <a href="{{ route('settings.index') }}" class="{{ request()->routeIs('settings.index') ? 'bg-slate-900 text-white' : 'text-slate-300' }} px-3 py-2 rounded-md text-sm font-medium" aria-current="false">
                            Settings
                        </a>

                        <a href="{{ route('profile.contacts') }}" class="{{ request()->routeIs('profile.contacts') ? 'bg-slate-900 text-white' : 'text-slate-300' }} px-3 py-2 rounded-md text-sm font-medium" aria-current="false">
                            Contacts
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
