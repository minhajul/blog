<x-layouts.dashboard>
    <x-dashboard.heading title="Contacts" description="Messages sent through the contact form." />

    <div class="mt-6 overflow-hidden card">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-line text-sm">
                <thead class="bg-surface-raised [&_th]:px-5 [&_th]:py-3 [&_th]:text-left [&_th]:font-medium [&_th]:label-mono">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">From</th>
                        <th scope="col">Message</th>
                        <th scope="col"><span class="sr-only">Action</span></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-line">
                    @forelse($contacts as $contact)
                        <tr class="align-top transition hover:bg-surface-raised/60">
                            <td class="px-5 py-4 whitespace-nowrap font-mono text-xs text-ink-subtle">{{ $contact->id }}</td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <p class="font-medium text-ink">{{ $contact->name }}</p>
                                <p class="text-ink-muted">{{ $contact->email }}</p>
                            </td>
                            <td class="min-w-64 px-5 py-4 text-ink-muted">
                                <p class="line-clamp-3 max-w-xl">{{ $contact->message }}</p>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-right">
                                <flux:button
                                    size="sm"
                                    variant="ghost"
                                    icon="arrow-uturn-left"
                                    href="mailto:{{ $contact->email }}"
                                    aria-label="Reply to {{ $contact->name }}"
                                />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-12 text-center text-ink-muted">No messages yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($contacts->hasPages())
        <div class="mt-6">
            <flux:pagination :paginator="$contacts" />
        </div>
    @endif
</x-layouts.dashboard>
