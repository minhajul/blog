<x-layouts.dashboard>
    <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
        <div class="grid grid-cols-1 lg:col-span-3">
            <div class="flex py-4">
                <flux:heading size="xl">Subscribers</flux:heading>
            </div>

            @include('errors.success')
            @include('errors.message')

            <div class="py-2">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-color">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-color uppercase tracking-wider">
                                                ID
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-color uppercase tracking-wider">
                                                Email
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-color uppercase tracking-wider">
                                                Status
                                            </th>

                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Action</span>
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody class="bg-color divide-y divide-gray-200" x-max="1">

                                        @foreach($subscribers as $subscriber)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-color">
                                                    {{ $subscriber->id }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-color">
                                                    {{ $subscriber->email }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm {{ $subscriber->isVerified() ? 'text-green-500' : 'text-gray-500' }}">
                                                    {{ $subscriber->status() }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <flux:button
                                                        class="cursor-pointer"
                                                        wire:click="delete({{ $subscriber->id }})"
                                                        wire:confirm="Are you sure you want to delete this item?"
                                                    >
                                                        <flux:icon.trash variant="micro" class="text-red-500" />
                                                    </flux:button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="py-3">
                                    {{ $subscribers->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
