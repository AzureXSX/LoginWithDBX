import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/styles.scss',
                'resources/sass/mainpage.scss',
                'resources/sass/CustomPostX.scss',
                'resources/sass/Scrollbar.scss',
                'resources/js/login.js',
                'resources/js/signup.js',
                'resources/js/img.js',
                'resources/js/mainpage.js',
                'resources/js/components/post.jsx'
            ],
            refresh: true,
        }),
        react(),
    ],
});
