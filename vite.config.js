import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

// noinspection JSUnusedGlobalSymbols
export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/style.scss',
        'resources/js/app.js',
        'resources/css/my-library.css',
        'resources/css/app.css',
        'resources/js/quick-answer-handler.js',
      ],
      refresh: true,
    }),
  ],
});
