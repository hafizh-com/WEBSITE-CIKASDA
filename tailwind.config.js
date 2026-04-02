import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/View/Middleware/Resources/Views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'sulteng-blue': '#003366', 
            },
            // TAMBAHKAN INI UNTUK EFEK SHADOW BIRU
            boxShadow: {
                'blue': '0 10px 40px -10px rgba(0, 51, 102, 0.5)',
                'blue-lg': '0 20px 50px -12px rgba(0, 51, 102, 0.4)',
            }
        },
    },

    plugins: [forms],
};