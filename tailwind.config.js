const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    mode: 'jit',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/views/**/*.vue",
        './node_modules/@flavorly/vanilla-components/dist/presets/tailwind/all.json', // for vanilla components
        "./node_modules/vue-tailwind-datepicker/**/*.js", // for vue-tailwind-datepicker
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: colors.indigo,
                "vtd-primary": colors.indigo, // Light mode Datepicker color
                "vtd-secondary": colors.gray, // Dark mode Datepicker color
            }
        },
    },

    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/forms'), 
    ],
};
