@if( session()->has('error') )
    <div class="mb-2 flex items-start gap-3 rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-800 dark:text-red-300" role="alert">
        <flux:icon.exclamation-triangle variant="mini" class="mt-px shrink-0" />
        <span>{{ session()->get('error') }}</span>
    </div>
@endif
