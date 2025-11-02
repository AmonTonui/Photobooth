<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Package') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('admin.packages.store') }}"
                  class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 space-y-4">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" name="name" type="text" class="mt-1 w-full" :value="old('name')" required autofocus />
                </div>

                <div>
                    <x-label for="description" value="{{ __('Description') }}" />
                    {{-- Use x-textarea for consistency if you have one, otherwise a standard textarea is fine --}}
                    <textarea id="description" name="description" rows="4"
                              class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-label for="base_price" value="{{ __('Base Price (KSh)') }}" />
                        <x-input id="base_price" name="base_price" type="number" step="0.01" min="0" class="mt-1 w-full" :value="old('base_price')" required />
                    </div>
                    <div>
                        <x-label for="duration_hours" value="{{ __('Duration (hours)') }}" />
                        <x-input id="duration_hours" name="duration_hours" type="number" min="1" max="24" class="mt-1 w-full" :value="old('duration_hours')" required />
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end space-x-2">
                    <a href="{{ route('admin.packages.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500
                              rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm
                              hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500
                              focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('Cancel') }}
                    </a>
                    <x-button>
                        {{ __('Create Package') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>



