@if( session()->has('success') )
    <div class="text-sm bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-2" role="alert">
        <span class="block sm:inline">{{ session()->get('success') }}</span>
    </div>
@endif
