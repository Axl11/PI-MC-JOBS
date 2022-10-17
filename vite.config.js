import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/bootstrap.css',
                'resources/js/bootstrap1.js',
                'resources/css/woox/animate.css',
                'resources/css/woox/fontawesome.css',
                'resources/css/woox/owl.css',
                'resources/css/woox/templatemo-woox-travel.css',
                'resources/js/woox/vendor/jquery.js',
                'resources/js/woox/custom.js',
                'resources/js/woox/isotope.js',
                'resources/js/woox/owl-carousel.js',
                'resources/js/woox/popup.js',
                'resources/js/woox/tabs.js'
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
});
