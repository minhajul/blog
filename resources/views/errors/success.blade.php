@if( session()->has('success') )
    <x-alert type="success" class="mb-6">{{ session()->get('success') }}</x-alert>
@endif
