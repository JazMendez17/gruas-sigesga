import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['var(--font-family)', ...defaultTheme.fontFamily.sans],
            },
            borderRadius: {
                '2xl': '16px',
                '3xl': '24px',
            },
            boxShadow: {
                'neumorphic': '8px 8px 16px #d0d5da, -8px -8px 16px #ffffff',
                'neumorphic-sm': '4px 4px 8px #d0d5da, -4px -4px 8px #ffffff',
                'neumorphic-inset': 'inset 6px 6px 12px #d0d5da, inset -6px -6px 12px #ffffff',
                'neumorphic-inset-sm': 'inset 3px 3px 6px #d0d5da, inset -3px -3px 6px #ffffff',
            },
        },
    },

    plugins: [forms],
};
