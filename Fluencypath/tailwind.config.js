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
            fontSize: {
                'xs': '0.75rem',   // 12px
                'sm': '0.875rem',  // 14px
                'base': '1rem',    // 16px  
                'lg': '1.125rem',  // 18px
                'xl': '1.25rem',   // 20px
                '2xl': '1.5rem',   // 24px
                '3xl': '1.875rem', // 30px
                '4xl': '2.25rem',  // 36px
                '5xl': '3rem',     // 48px
            },
            fontWeight: {
                'thin': '100',
                'extralight': '200',
                'light': '300',
                'normal': '400',
                'medium': '500',
                'semibold': '600',
                'bold': '700',
                'extrabold': '800',
                'black': '900',
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
                    700: '#0F97A6',
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
                    500: '#E63946',
                    600: '#FFD166',
                    700: '#6FB3D2',
                    800: '#F05437',
                    900: '#FFC833',
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
