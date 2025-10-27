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
            <x-validation-errors class="mb-4" />

            <div class="mt-4">
                        @if(isset($items) && method_exists($items, 'links'))
                            {{ $items->links() }}
                        @endif
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div class="overflow-x-auto">
  
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
           
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Name
                                    </th>
                          
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Base Price (KSh)
                                    </th>
                                  
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Duration (Hours)
                                    </th>
                       
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
      
                                @forelse ($items ?? [] as $package)
                                    <tr>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $package->name }}
                                        </td>
      
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                            {{ number_format($package->base_price, 2) }}
                                        </td>
 
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                            {{ $package->duration_hours }}
                                        </td>
                                
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <div class="inline-flex items-center gap-2">
                                                <x-secondary-button as="a" href="{{ route('admin.packages.edit', $package) }}">{{ __('Edit') }}</x-secondary-button><br>
                                                <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this package?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-danger-button type="submit">{{ __('Delete') }}</x-danger-button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        {{-- Added px-6 py-4 --}}
                                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">
                                            No packages found. Add one to get started!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                     {{-- Ensure pagination links exist before rendering --}}
                    @if (isset($items) && method_exists($items, 'links'))
                        <div class="mt-4">
                            {{ $items->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
