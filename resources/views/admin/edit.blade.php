<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Edit Package</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('admin.packages.update',$package) }}" class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 space-y-4">
                @csrf @method('PUT')
                <div>
                    <x-label value="Name" />
                    <x-input name="name" class="mt-1 w-full" required value="{{ old('name',$package->name) }}" />
                </div>
                <div>
                    <x-label value="Description" />
                    <x-textarea name="description" class="mt-1 w-full" rows="4">{{ old('description',$package->description) }}</x-textarea>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-label value="Base Price (KSh)" />
                        <x-input name="base_price" type="number" step="0.01" min="0" class="mt-1 w-full" required value="{{ old('base_price',$package->base_price) }}" />
                    </div>
                    <div>
                        <x-label value="Duration (hours)" />
                        <x-input name="duration_hours" type="number" min="1" max="24" class="mt-1 w-full" required value="{{ old('duration_hours',$package->duration_hours) }}" />
                    </div>
                </div>
                <div class="pt-4">
                    <x-button>Update</x-button>
                    <x-secondary-button as="a" href="{{ route('admin.packages.index') }}">Cancel</x-secondary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
