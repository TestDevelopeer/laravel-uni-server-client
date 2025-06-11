import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/vendor/bootstrap.min.css',
                'resources/js/vendor/bootstrap.min.js'
            ],
            refresh: true,
        }),
    ],
});
