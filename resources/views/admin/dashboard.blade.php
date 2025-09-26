<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" >{{ __('Admin Dashboard') }}</h2>
    </x-slot>

    @php
        $from = now()->startOfMonth(); 
        $to = now()->endOfMonth();
        $bookings ??= \App\Models\Booking::whereBetween('created_at', [$from,$to])->count();
        $revenue  ??= 0.0;
        $expenses ??= 0.0;
        $profit   ??= ($revenue - $expenses);
    @endphp

    {{-- <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="p-5 bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="text-sm text-gray-800 dark:text-gray-200">Bookings (month)</div>
                <div class="mt-2 text-3xl text-gray-800 dark:text-gray-200">{{ $bookings }}</div>
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
    </div> --}}


    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- KPI CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @php
                    $cards = [
                        ['label' => 'Bookings (month)', 'value' => $bookings, 'suffix' => '', 'icon' => 'calendar-days'],
                        ['label' => 'Revenue (month)',  'value' => number_format($revenue,2),  'suffix' => 'KSh', 'icon' => 'wallet'],
                        ['label' => 'Expenses (month)', 'value' => number_format($expenses,2), 'suffix' => 'KSh', 'icon' => 'receipt'],
                        ['label' => 'Net Profit',       'value' => number_format($profit,2),   'suffix' => 'KSh', 'icon' => 'trending-up'],
                    ];
                @endphp

                @foreach ($cards as $c)
                <div class="p-6 rounded-2xl bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
                    <div class="flex items-center gap-4">
                        {{-- Icon --}}
                        <div class="shrink-0 w-12 h-12 rounded-xl bg-gray-100 dark:bg-gray-700 grid place-items-center">
                            @switch($c['icon'])
                                @case('calendar-days')
                                    <svg class="w-6 h-6 text-gray-700 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M8 7V3m8 4V3M3 11h18M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"/>
                                    </svg>
                                    @break
                                @case('wallet')
                                    <svg class="w-6 h-6 text-gray-700 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M20 12h-4a2 2 0 1 0 0 4h4v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4z"/>
                                    </svg>
                                    @break
                                @case('receipt')
                                    <svg class="w-6 h-6 text-gray-700 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M7 7h10M7 11h10M7 15h6M5 21l2-1 2 1 2-1 2 1 2-1 2 1V5a2 2 0 0 0-2-2H7A2 2 0 0 0 5 5v16z"/>
                                    </svg>
                                    @break
                                @case('trending-up')
                                    <svg class="w-6 h-6 text-gray-700 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M3 17l6-6 4 4 7-7M14 7h7v7"/>
                                    </svg>
                                    @break
                            @endswitch
                        </div>
                        {{-- Texts --}}
                        <div class="flex-1">
                            <div class="text-sm text-gray-800 dark:text-gray-200">{{ $c['label'] }}</div>
                            <div class="mt-1 flex items-baseline justify-between">
                                <div class="text-3xl font-semibold tracking-tight text-gray-800 dark:text-gray-200">
                                    <span class="text-sm mr-1">{{ $c['suffix'] }}</span>{{ $c['value'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- CHARTS --}}
            <div class="mt-8 grid grid-cols-1 xl:grid-cols-2 gap-6">
                <div class="p-6 rounded-2xl bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
                    <div class="mb-4 text-sm font-medium text-gray-700 dark:text-gray-300">Bookings per day (this month)</div>
                    <canvas id="chartBookings"></canvas>
                </div>
                <div class="p-6 rounded-2xl bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
                    <div class="mb-4 text-sm font-medium text-gray-700 dark:text-gray-300">Revenue vs Expenses (last 6 months)</div>
                    <canvas id="chartRe"></canvas>
                </div>
                <div class="xl:col-span-2 p-6 rounded-2xl bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
                    <div class="mb-4 text-sm font-medium text-gray-700 dark:text-gray-300">Top Packages (all time)</div>
                    <canvas id="chartPackages"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart.js + dark-mode aware theming --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
        // Data (from controller)
        const bookingsLabels = @json($bookingsByDayLabels ?? []);
        const bookingsData   = @json($bookingsByDayData ?? []);
        const reLabels       = @json($reMonthLabels ?? []);
        const revenueSeries  = @json($revenueSeries ?? []);
        const expenseSeries  = @json($expenseSeries ?? []);
        const pkgLabels      = @json($pkgLabels ?? []);
        const pkgData        = @json($pkgData ?? []);

        // Tailwind colors via computed styles for light/dark
        const isDark = () => document.documentElement.classList.contains('dark');
        const palette = () => ({
            text:   isDark() ? '#E5E7EB' : '#374151',  // gray-200 / gray-700
            grid:   isDark() ? 'rgba(243,244,246,0.08)' : 'rgba(17,24,39,0.08)',
            blue:   '#3B82F6', // tailwind blue-500
            emerald:'#10B981', // emerald-500
            rose:   '#F43F5E', // rose-500
            amber:  '#F59E0B', // amber-500
            slate:  '#64748B',
        });

        function baseOpts() {
            const c = palette();
            return {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { ticks: { color: c.text }, grid: { color: c.grid } },
                    y: { ticks: { color: c.text }, grid: { color: c.grid }, beginAtZero: true }
                },
                plugins: {
                    legend: { labels: { color: c.text } },
                    tooltip: { intersect: false, mode: 'index' }
                }
            };
        }

        // Bookings line
        new Chart(document.getElementById('chartBookings'), {
            type: 'line',
            data: {
                labels: bookingsLabels,
                datasets: [{
                    label: 'Bookings',
                    data: bookingsData,
                    borderColor: palette().blue,
                    backgroundColor: palette().blue + '33',
                    borderWidth: 2,
                    pointRadius: 2,
                    tension: .3,
                    fill: true,
                }]
            },
            options: { ...baseOpts() }
        });

        // Revenue vs Expenses
        new Chart(document.getElementById('chartRe'), {
            type: 'line',
            data: {
                labels: reLabels,
                datasets: [
                    { label: 'Revenue (KSh)', data: revenueSeries, borderColor: palette().emerald, backgroundColor: palette().emerald + '33', borderWidth: 2, tension: .3, fill: true },
                    { label: 'Expenses (KSh)', data: expenseSeries, borderColor: palette().rose,    backgroundColor: palette().rose + '33',    borderWidth: 2, tension: .3, fill: true }
                ]
            },
            options: { ...baseOpts() }
        });

        // Packages bar
        new Chart(document.getElementById('chartPackages'), {
            type: 'bar',
            data: {
                labels: pkgLabels,
                datasets: [{
                    label: 'Bookings',
                    data: pkgData,
                    backgroundColor: [palette().blue, palette().emerald, palette().amber, palette().rose, palette().slate].map(c=>c+'cc'),
                    borderColor:     [palette().blue, palette().emerald, palette().amber, palette().rose, palette().slate],
                    borderWidth: 1.5,
                }]
            },
            options: { ...baseOpts() }
        });

        // Re-render charts on dark-mode toggle (if you add a toggle later)
        const obs = new MutationObserver(() => location.reload());
        obs.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
    </script>

</x-app-layout>
