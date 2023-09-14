import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/app.css',
                'resources/js/calendarForStaffRequest.js',
                'resources/js/calendarForStaffConfirm.js'
            ],
            refresh: true,
        }),
    ],
});
