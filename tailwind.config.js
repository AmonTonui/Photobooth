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
