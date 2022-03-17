@if($setting = \App\Models\Setting::first())
    <img class="h-8 w-auto sm:h-10" src="{{ $setting->logoUrl() }}" alt="Logo">
@else
    <h2 class="text-4xl py-2 font-medium text-gray-400 hover:text-gray-500 italic">{{ config('app.name') }}</h2>
@endif
