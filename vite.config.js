import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: 'https://snaplink-xuc5.onrender.com/', // força o uso de HTTPS no caminho base
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
                'resources/js/contact.js',
            ],
            refresh: true,
        }),
    ],
});
