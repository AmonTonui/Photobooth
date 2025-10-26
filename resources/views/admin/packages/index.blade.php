<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Packages</h2>
            <x-button as="a" href="{{ route('admin.packages.create') }}">+ New Package</x-button>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('ok'))
                <x-banner>{{ session('ok') }}</x-banner>
            @endif

            <div class="mt-4">
                        @if(isset($items) && method_exists($items, 'links'))
                            {{ $items->links() }}
                        @endif
            </div>

            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="text-gray-500 dark:text-gray-400">
                            <tr>
                                <th class="py-2 text-left text-xl text-gray-800 dark:text-gray-200">Name</th>
                                <th class="py-2 text-left text-xl text-gray-800 dark:text-gray-200">Base Price</th>
                                <th class="py-2 text-left text-xl text-gray-800 dark:text-gray-200">Duration (h)</th>
                                <th class="py-2"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100/60 dark:divide-gray-700/60">
                            @forelse($items as $p)
                                <tr>
                                    <td class="py-2">{{ $p->name }}</td>
                                    <td class="py-2">KSh {{ number_format($p->base_price, 2) }}</td>
                                    <td class="py-2">{{ $p->duration_hours }}</td>
                                    <td class="py-2 text-right space-x-2">
                                        <x-secondary-button as="a" href="{{ route('admin.packages.edit',$p) }}">Edit</x-secondary-button>
                                        <form class="inline" method="POST" action="{{ route('admin.packages.destroy',$p) }}">
                                            @csrf @method('DELETE')
                                            <x-danger-button onclick="return confirm('Delete this package?')">Delete</x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="py-4 text-center text-xl text-gray-800 dark:text-gray-200">No packages yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">{{ $items->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
