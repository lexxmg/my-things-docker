import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                    'resources/css/croppie.css',
                    'resources/css/app.css',
                    'resources/css/normalize.css',
                    'resources/css/master.css',
                    'resources/whhg-font/css/whhg.css',
                    'resources/css/form.css',
                    'resources/css/login.css',
                    'resources/css/admin/login.css',
                    'resources/css/buttons.css',
                    'resources/css/alert.css',
                    'resources/css/header.css',
                    'resources/css/main.css',
                    'resources/css/admin/main.css',
                    'resources/css/footer.css',
                    'resources/css/setting.css',
                    'resources/css/admin/setting.css',
                    'resources/css/admin/create-user.css',
                    'resources/css/admin/edit-user.css',
                    'resources/css/password.css',
                    'resources/css/show.css',
                    'resources/css/destroy.css',
                    'resources/css/add-avatar.css',
                    'resources/css/edit-avatar.css',
                    'resources/css/show-avatar.css',
                    'resources/css/admin/destroy.css',
                    'resources/css/admin/search.css',
                    'resources/css/admin/home.css',
                    'resources/css/admin/user-card.css',
                    'resources/js/app.js',
                    'resources/js/script.js',
                    'resources/js/show-avatar.js',
                    'resources/js/user.js',
                    'resources/js/views.js',
                    'resources/js/search.js',
                    'resources/js/add-avatar.js',
                    'resources/js/edit-avatar.js',
                    'resources/js/admin-setting.js'
                ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        hmr: {
            host: '192.168.0.14' // ip машины где запущено приложение
        },
    },
});
