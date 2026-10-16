@if( session()->has('error') )
    <x-alert type="error" class="mb-2">{{ session()->get('error') }}</x-alert>
@endif
