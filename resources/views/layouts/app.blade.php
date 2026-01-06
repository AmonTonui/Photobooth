<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body
    x-data="{
        sidebarToggle: false,
        theme: localStorage.getItem('theme') || 'system',
        darkMode: false,
        updateTheme() {
            if (this.theme === 'system') {
                this.darkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
            } else {
                this.darkMode = this.theme === 'dark';
            }
        },
        init() {
            this.updateTheme();
            this.$watch('theme', (val) => {
                localStorage.setItem('theme', val);
                this.updateTheme();
            });
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                if (this.theme === 'system') {
                    this.updateTheme();
                }
            });
        }
    }"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode, 'text-body bg-gray-50': !darkMode}"
    class="font-outfit"
>
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Content Area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            <!-- Header -->
            @include('partials.header')

            <!-- Main Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
