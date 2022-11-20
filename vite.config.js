import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'node_modules/tom-select/dist/css/tom-select.min.css',
                'resources/js/app.js',
                'resources/js/pages/access.js',
            ],
            refresh: true,
        }),
    ],
});
