import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

// noinspection JSUnusedGlobalSymbols
export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/style.scss',
        'resources/css/my-library.css',
        'resources/css/app.css',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
  ],
  resolve: {
    alias: {
      '@': '/resources/js',
    },
  },
});
