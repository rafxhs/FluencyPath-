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
                primary: ["Plus Jakarta Sans", "serif"],
                secondary: ["Open Sans", "serif"],
            },
            colors: {
                // Primary Colors
                'primary': {
                    100: '#FEFEFE',
                    200: '#FAFAFA',
                    300: '#F5F5F5',
                    400: '#1FA5B4',
                    500: '#14A68B',
                    600: '#12A6A6',
                    700: '0F97A6',
                    800: '#0D758C',
                    900: '#09697E',
                    1000: '#062F40', 
                },
                // Secondary Colors
                'secondary': {
                    100: '#A3EAD5',
                    200: '#9FE6E6',
                    300: '#A3E3ED',
                    400: '#A6C7D8',
                },
                // Neutral Colors
                'neutral': {
                    100: '#E1E1E1',
                    200: '#D9D9D9',
                    300: '#A3A3A3',
                    400: '#5F6465',
                    500: '#2E2E2E',
                    600: '#121212',
                },
            }

        },
    },

    plugins: [forms],
};
