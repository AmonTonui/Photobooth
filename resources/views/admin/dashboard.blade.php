<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" >{{ __('Admin Dashboard') }}</h2>
    </x-slot>

    @php
        $from = now()->startOfMonth(); 
        $to = now()->endOfMonth();
        $bookings = \App\Models\Booking::whereBetween('created_at', [$from,$to])->count();
        $revenue  = 0.0;
        $expenses = 0.0;
        $profit   = $revenue - $expenses;
    @endphp

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="p-5 bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="text-sm text-gray-500">Bookings (month)</div>
                <div class="mt-2 text-3xl font-semibold">{{ $bookings }}</div>
            </div>
            <div class="p-5 bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="text-sm text-gray-800 dark:text-gray-200">Revenue (month)</div>
                <div class="mt-2 text-3xl text-gray-800 dark:text-gray-200">KSh {{ number_format($revenue,2) }}</div>
            </div>
            <div class="p-5 bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="text-sm text-gray-800 dark:text-gray-200">Expenses (month)</div>
                <div class="mt-2 text-3xl font-semibold text-gray-800 dark:text-gray-200">KSh {{ number_format($expenses,2) }}</div>
            </div>
            <div class="p-5 bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="text-sm text-gray-800 dark:text-gray-200">Net Profit</div>
                <div class="mt-2 text-3xl font-semibold text-gray-800 dark:text-gray-200">KSh {{ number_format($profit,2) }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
