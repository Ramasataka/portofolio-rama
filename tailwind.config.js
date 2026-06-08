import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import flowbite from 'flowbite/plugin'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: '#F0F7FF',
                    100: '#E3F2FD',
                    200: '#BBDEFB',
                    300: '#90CAF9',
                    400: '#64B5F6',
                    500: '#2196F3',
                    600: '#0099FF',
                    700: '#0066CC',
                    800: '#00264D',
                    900: '#001433',
                },
            },
        },
    },

    plugins: [forms, flowbite],
};
