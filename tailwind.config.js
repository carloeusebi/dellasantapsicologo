/** @type {import('tailwindcss').Config} */
import theme from 'daisyui/src/theming/themes';
import daisyui from 'daisyui';
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",

        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['sans', 'sans-serif'],
            },
            colors: {
                brand: '#6ecc84',
                'brand-secondary': '#264e32',
            },
        },
    },
    daisyui: {
        themes: [
            {
                light: {
                    ...theme.light,
                    primary: '#6ecc84',
                    secondary: '#264e32',
                    accent: '#ff00d3',
                },
            }, {
                dark: {
                    ...theme.dark,
                    primary: '#6ecc84',
                    secondary: '#264e32',
                    accent: '#ff00d3',
                },
            },
            "cupcake",
            "bumblebee",
            "emerald",
            "corporate",
            "synthwave",
            "retro",
            "cyberpunk",
            "valentine",
            "halloween",
            "garden",
            "forest",
            "aqua",
            "lofi",
            "pastel",
            "fantasy",
            "wireframe",
            "black",
            "luxury",
            "dracula",
            "cmyk",
            "autumn",
            "business",
            "acid",
            "lemonade",
            "night",
            "coffee",
            "winter",
            "dim",
            "nord",
            "sunset",
        ],
    },
    plugins: [
        daisyui,
    ],
};

