/** @type {import('tailwindcss').Config} */
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
          ...require('daisyui/src/theming/themes').light,
          primary: '#6ecc84',
          secondary: '#264e32',
        },
      },
      "dark",
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
    require('daisyui'),
  ],
};

