import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        fontSize: {

            'xs': '.75rem',
     
            'sm': '.875rem',
     
            'tiny': '.875rem',
             'base': '1rem',
             'lg': '1.125rem',
             'xl': '1.25rem',
             '2xl': '1.5rem',
     
            '3xl': '1.875rem',
     
            '4xl': '2.25rem',
             '5xl': '3rem',
             '6xl': '4rem',
     
            '7xl': '5rem',
           },
    },

    plugins: [forms, typography],
};
