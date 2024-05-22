/** @type {import('tailwindcss').Config} */
export default {
    presets: [
        require("./vendor/power-components/livewire-powergrid/tailwind.config.js"),
        require('./vendor/wireui/wireui/tailwind.config.js'),
    ],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './app/Livewire/**/*Table.php',
        './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
        './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php',
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
    ],
    darkMode: 'false',
    theme: {
        extend: {
            colors: {
                primary: '#6ecc84',
                secondary: '#264e32',
            },
        },
    },
    plugins: [
        // require('@tailwindcss/forms'),
    ],
}

