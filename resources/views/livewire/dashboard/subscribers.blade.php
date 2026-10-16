<x-layouts.dashboard>
    <x-dashboard.heading title="Subscribers" description="People who signed up to hear about new posts." />

    <div class="mt-6 space-y-3">
        @include('errors.success')
        @include('errors.message')
    </div>

    <div class="mt-2 overflow-hidden card">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-line text-sm">
                <thead class="bg-surface-raised">
                    <tr>
                        <th scope="col" class="px-5 py-3 text-left font-mono text-xs font-medium tracking-wider text-ink-subtle uppercase">ID</th>
                        <th scope="col" class="px-5 py-3 text-left font-mono text-xs font-medium tracking-wider text-ink-subtle uppercase">Email</th>
                        <th scope="col" class="px-5 py-3 text-left font-mono text-xs font-medium tracking-wider text-ink-subtle uppercase">Status</th>
                        <th scope="col" class="relative px-5 py-3"><span class="sr-only">Action</span></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-line">
                    @forelse($subscribers as $subscriber)
                        <tr class="transition hover:bg-surface-raised/60">
                            <td class="px-5 py-4 whitespace-nowrap font-mono text-xs text-ink-subtle">{{ $subscriber->id }}</td>
                            <td class="px-5 py-4 whitespace-nowrap font-medium text-ink">{{ $subscriber->email }}</td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <flux:badge size="sm" :color="$subscriber->isVerified() ? 'green' : 'zinc'">
                                    {{ $subscriber->status() }}
                                </flux:badge>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-right">
                                <flux:button
                                    size="sm"
                                    variant="ghost"
                                    icon="trash"
                                    class="cursor-pointer !text-red-500"
                                    wire:click="delete({{ $subscriber->id }})"
                                    wire:confirm="Are you sure you want to delete this item?"
                                    aria-label="Delete subscriber"
                                />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-12 text-center text-ink-muted">No subscribers yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($subscribers->hasPages())
        <div class="mt-6">
            <flux:pagination :paginator="$subscribers" />
        </div>
    @endif
</x-layouts.dashboard>
