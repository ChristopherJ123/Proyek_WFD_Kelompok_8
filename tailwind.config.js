import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

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
                'brand': {
                    100: '#ffe5b6',
                    300: '#c7ac6b',
                    500: '#b2935b',
                    700: '#957252',
                    900: '#544541',
                }
            }
        },
    },

    safelist: [
        'ml-0', 'ml-8', 'ml-16', 'ml-24', 'ml-32', 'ml-40', 'ml-48', 'ml-56', 'ml-64', // etc., as needed (classes pre rendered)
    ],

    plugins: [forms],
};
