import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            publicDirectory: '../../public',
            buildDirectory: "front",
            input: ['./scss/app.scss', './js/app.js'],
            refresh: true,
        }),
    ],
});
