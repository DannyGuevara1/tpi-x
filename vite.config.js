import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/adminProduct.css',
                'resources/css/adminUsers.css',
                'resources/css/cart.css',
                'resources/css/index.css',
                'resources/css/login.css',
                'resources/css/message.css',
                'resources/css/orders.css',
                'resources/css/profile.css',
                'resources/css/styles.css',
                'resources/css/nav.css',
                'resources/js/app.js',
                'resources/js/adminProduct.js',
                'resources/js/adminUsers.js',
                'resources/js/index.js',
                'resources/js/login.js',
                'resources/js/profile.js',
                'resources/js/index-behaviour.js',
                'resources/js/orders.js',
                'resources/js/historySales.js',
                'resources/js/cart.js',
                'resources/js/wishList.js'
            ],
            refresh: true,
        }),
    ],
});
