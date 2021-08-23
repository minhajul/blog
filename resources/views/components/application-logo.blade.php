@if($setting = \App\Models\Setting::first())
    <img class="h-8 w-auto sm:h-10" src="{{ $setting->logoUrl() }}" alt="Logo">
@else
    <h2 class="text-2xl font-medium text-gray-900 hover:text-gray-800 italic">{{ config('app.name') }}</h2>
@endif
