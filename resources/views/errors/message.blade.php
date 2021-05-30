@if( session()->has('error') )
    <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2" role="alert">
        <span class="block sm:inline">{{ session()->get('error') }}</span>
    </div>
@endif
