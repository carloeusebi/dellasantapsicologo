/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                primary: '#6ecc84',
                secondary: '#264e32',
            },
        },
    },
    daisyui: {
        themes: [
            {
                light: {
                    ...require('daisyui/src/theming/themes').light,
                    primary: '#6ecc84',
                    secondary: '#264e32',
                },
            },
            {
                dark: {
                    ...require('daisyui/src/theming/themes').dark,
                    primary: '#264e32',
                    secondary: '#6ecc84',
                }
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
        require('daisyui')
    ],
}

