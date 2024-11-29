<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="/favicon/apple-touch-icon.png">
        <!-- 180x180 - ставим первым для safari --> 
        <link rel="icon" href="/favicon/favicon.ico" sizes="any"><!-- 32x32 --> 
        <link rel="icon" href="/favicon/icon.svg" type="image/svg+xml"> 
        <link rel="manifest" href="/favicon/manifest.webmanifest">

        <title>@yield('title')</title>

        @vite([ 'resources/css/normalize.css',
                'resources/css/master.css',
                'resources/whhg-font/css/whhg.css',
                'resources/css/buttons.css',
                'resources/css/form.css',
                'resources/css/login.css',
                'resources/css/header.css',
                'resources/css/admin/main.css',
                'resources/css/admin/setting.css',
                'resources/css/admin/edit-user.css',
                'resources/css/password.css',
                'resources/css/admin/destroy.css',
                'resources/css/admin/create-user.css',
                'resources/css/footer.css',
                'resources/css/show.css'
            ]) 
    </head>

    <body>
        <div class="wrapper">
            @yield('content')
        </div>

        @vite([ 
            'resources/js/app.js',
            'resources/js/script.js',
            'resources/js/user.js'
        ]) 
    </body>
</html>
