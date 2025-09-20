import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/livewire/livewire/**/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    safelist: [
    // Jetstream login‐card & layout utilities
    'min-h-screen','flex','items-center','justify-center',
    'pt-6','sm:pt-0','bg-gray-100','dark:bg-gray-900',
    'w-full','sm:max-w-md','mt-6',
    'px-6','py-4','bg-white','dark:bg-gray-800',
    'shadow-md','overflow-hidden','sm:rounded-lg',
    'px-4','py-2','bg-indigo-600','hover:bg-indigo-700','focus:ring-indigo-500',
    'rounded-md','border','border-gray-300','dark:border-gray-700',
    'mx-auto','max-w-7xl','py-6','sm:px-6','lg:px-8',
    'text-gray-900','dark:text-gray-100',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
