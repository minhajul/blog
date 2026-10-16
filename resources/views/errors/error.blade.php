@if ($errors->any())
    <x-alert type="error" icon="x-circle">
        <p class="font-medium">There were some problems with your input.</p>
        <ul class="mt-1 list-disc space-y-0.5 pl-4">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-alert>
@endif
