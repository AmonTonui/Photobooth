<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 xl:grid-cols-2 2xl:gap-7.5">
    {{-- Card 1: Bookings --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
            <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3M3 11h18M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z" stroke="currentColor" fill="none"/>
            </svg>
        </div>

        <div class="mt-5 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">Bookings (month)</span>
                <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                    {{ $bookings }}
                </h4>
            </div>
        </div>
    </div>

    {{-- Card 2: Revenue --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
            <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 12h-4a2 2 0 1 0 0 4h4v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4z" stroke="currentColor" fill="none"/>
            </svg>
        </div>

        <div class="mt-5 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">Revenue (month)</span>
                <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                    {{ number_format($revenue, 2) }} <span class="text-sm font-medium text-gray-500 dark:text-gray-400">KSh</span>
                </h4>
            </div>
        </div>
    </div>

    {{-- Card 3: Expenses --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
            <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h10M7 11h10M7 15h6M5 21l2-1 2 1 2-1 2 1 2-1 2 1V5a2 2 0 0 0-2-2H7A2 2 0 0 0 5 5v16z" stroke="currentColor" fill="none"/>
            </svg>
        </div>

        <div class="mt-5 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">Expenses (month)</span>
                <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                    {{ number_format($expenses, 2) }} <span class="text-sm font-medium text-gray-500 dark:text-gray-400">KSh</span>
                </h4>
            </div>
        </div>
    </div>

    {{-- Card 4: Profit --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
            <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 17l6-6 4 4 7-7M14 7h7v7" stroke="currentColor" fill="none"/>
            </svg>
        </div>

        <div class="mt-5 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">Net Profit</span>
                <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                    {{ number_format($profit, 2) }} <span class="text-sm font-medium text-gray-500 dark:text-gray-400">KSh</span>
                </h4>
            </div>
        </div>
    </div>
</div>
