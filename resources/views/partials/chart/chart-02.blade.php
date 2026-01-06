<div class="rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
            Profit & Loss
        </h3>

        <div x-data="{ dropdownOpen: false }" class="relative h-fit">
            <button @click="dropdownOpen = !dropdownOpen" class="text-gray-400 hover:text-gray-700 dark:hover:text-white">
                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z" fill=""/>
                </svg>
            </button>
            <div x-show="dropdownOpen" @click.outside="dropdownOpen = false" class="absolute right-0 top-full z-40 w-40 p-2 space-y-1 bg-white border border-gray-200 rounded-2xl shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark" style="display: none;">
                <button class="flex w-full px-3 py-2 font-medium text-left text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                    Last 6 Months
                </button>
                <button class="flex w-full px-3 py-2 font-medium text-left text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                    Last Year
                </button>
            </div>
        </div>
    </div>

    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <div class="-ml-5 min-w-[650px] pl-2 xl:min-w-full">
            <div id="chartTwo" class="h-full"></div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const revenue = @json($revenueSeries);
        const expenses = @json($expenseSeries);
        const labels = @json($reMonthLabels);

        const getOptions = (isDark) => {
            return {
                series: [
                    {
                        name: 'Revenue',
                        data: revenue
                    },
                    {
                        name: 'Expenses',
                        data: expenses
                    }
                ],
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: {
                        show: false
                    },
                    fontFamily: 'Outfit, sans-serif',
                    foreColor: isDark ? '#AEB7C0' : '#64748B'
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '40%',
                        borderRadius: 3
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 4,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: labels,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                grid: {
                    borderColor: isDark ? '#333A48' : '#E2E8F0',
                    strokeDashArray: 4,
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true
                        }
                    },
                },
                fill: {
                    opacity: 1
                },
                colors: ['#465FFF', '#F43F5E'], // Using Brand Blue for Revenue, Red for Expenses
                tooltip: {
                    theme: isDark ? 'dark' : 'light',
                    y: {
                        formatter: function (val) {
                            return "KSh " + val
                        }
                    }
                }
            };
        };

        const chartElement = document.getElementById('chartTwo');
        if (chartElement) {
            let isDark = document.body.classList.contains('dark');
            let chart = new ApexCharts(chartElement, getOptions(isDark));
            chart.render();

            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.attributeName === 'class') {
                        const newIsDark = document.body.classList.contains('dark');
                        if (newIsDark !== isDark) {
                            isDark = newIsDark;
                            chart.updateOptions(getOptions(isDark));
                        }
                    }
                });
            });
            observer.observe(document.body, { attributes: true });
        }
    });
</script>
