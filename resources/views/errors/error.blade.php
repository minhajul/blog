@if ($errors->any())
    <div class="flex items-start gap-3 rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-800 dark:text-red-300" role="alert">
        <flux:icon.x-circle variant="mini" class="mt-px shrink-0" />
        <div>
            <p class="font-medium">There were some problems with your input.</p>
            <ul class="mt-1 list-disc space-y-0.5 pl-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
