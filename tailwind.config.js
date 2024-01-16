const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require("tailwindcss/colors")

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./index.html", 
        "./src/**/*.{vue,js,ts,jsx,tsx}",
       "./node_modules/vue-tailwind-datepicker/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                dsdigii: ['DS-DIGII', 'sans-serif'],
            },
            backgroundImage: {
                "gradient-theme": "linear-gradient(to bottom, #9cd7f1 0%, #5189c5 100%)",
            },
            backgroundColor: {
                "theme-blue": "#71C7EF",
                "theme-blue-dark": "#1C69AB",
                "theme-blue-light": "#E2F2FC",
            },
            textColor: {
                "theme-blue": "#71C7EF",
                "theme-blue-dark": "#1C69AB",
                "theme-blue-light": "#E2F2FC",
            },
            borderColor: {
                "theme-blue": "#71C7EF",
                "theme-blue-dark": "#1C69AB",
                "theme-blue-light": "#E2F2FC",
            },
            colors: {
                "vtd-primary": colors.sky, // Light mode Datepicker color
                "vtd-secondary": colors.gray, // Dark mode Datepicker color
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
