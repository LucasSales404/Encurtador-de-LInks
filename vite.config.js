import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/menuBar.js',
                'resources/js/logout.js',
                'resources/js/showUrl.js',
                'resources/js/alert.js',
                'resources/js/links.js',
                'resources/js/loading-screen.js',
                'resources/js/index.js',
                'resources/js/pasteLink.js',
            ],
            refresh: true,
        }),
    ],
});
