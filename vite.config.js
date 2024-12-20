import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

// noinspection JSUnusedGlobalSymbols
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/evaluation.css',
                'resources/js/app.js',
                'resources/js/enable-push.js',
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
