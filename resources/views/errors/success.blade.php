@if( session()->has('success') )
    <div class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-800 dark:text-emerald-300" role="alert">
        <flux:icon.check-circle variant="mini" class="mt-px shrink-0" />
        <span>{{ session()->get('success') }}</span>
    </div>
@endif
