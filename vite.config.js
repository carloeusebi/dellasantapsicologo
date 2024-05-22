import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/style.scss', 'resources/js/app.js', 'resources/css/my-library.css', 'resources/css/app.css'],
            refresh: true,
        }),
    ],
});
