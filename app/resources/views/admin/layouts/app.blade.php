<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        @vite([ 'resources/css/normalize.css',
                'resources/css/master.css',
                'resources/whhg-font/css/whhg.css',
                'resources/css/buttons.css',
                'resources/css/form.css',
                'resources/css/login.css',
                'resources/css/header.css',
                'resources/css/main.css',
                'resources/css/footer.css'
            ]) 
    </head>

    <body>
        <div class="wrapper">
            @yield('content')
        </div>

        @vite([ 
            'resources/js/app.js',
            'resources/js/script.js'
        ]) 
    </body>
</html>
