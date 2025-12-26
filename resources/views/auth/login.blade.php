<x-layouts.auth>
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mt-4">
            <flux:input
                type="email"
                :label="__('Email address')"
                name="email"
                :value="old('email')"
                autocomplete="email"
                placeholder="email@example.com"
                required="true"
            />
        </div>

        <div class="mt-4">
            <flux:input
                :label="__('Password')"
                type="password"
                required="true"
                autocomplete="current-password"
                :placeholder="__('Password')"
                viewable
            />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-button class="ml-3">
                {{ __('Login') }}
            </x-button>
        </div>
    </form>
</x-layouts.auth>
