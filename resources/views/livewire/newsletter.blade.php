<div class="py-5">
    <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
        <div class="ml-4 mt-2">
            <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                Subscribe to the newsletter
            </h3>
            <p class="mt-2 text-base text-gray-300">
                The latest news, articles, and resources, sent to your inbox weekly.
            </p>
        </div>

        <div class="ml-4 mt-2 shrink-0">
            <form wire:submit.prevent="subscribe" class="mt-4 sm:flex sm:max-w-md lg:mt-0">
                <label for="email_address" class="sr-only">
                    Email address
                </label>

                <input type="email" wire:model.defer="email_address" id="email_address" autocomplete="email" required="" class="block appearance-none min-w-0 w-full bg-white border border-transparent rounded-md py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white focus:border-white focus:placeholder-gray-400 sm:max-w-xs" placeholder="Enter your email">

                <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:shrink-0">
                    <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-500 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500">
                        Subscribe
                    </button>
                </div>
            </form>

            <div>
                @error('email_address')
                    <span class="text-red-500 text-sm italic">{{ $message }}</span>
                @enderror

                @if(session()->has('message'))
                    <span class="text-red-500 text-sm italic">{{ session()->get('message') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
