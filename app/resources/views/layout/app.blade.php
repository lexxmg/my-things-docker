<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Мои вещи</title>

        @vite([ 'resources/css/normalize.css',
                'resources/css/master.css',
                'resources/whhg-font/css/whhg.css',
                'resources/css/header.css',
                'resources/css/main.css',
                'resources/css/footer.css',
                'resources/css/buttons.css',
                'resources/js/app.js',
                'resources/js/script.js'
            ]) 
    </head>

    <body>
        <div class="wrapper">
            <header class="header">
                <h1 class="header__title">Мои вещи</h1>

                <nav class="nav-mob">
                    <ul class="nav-mob__list nav-mob-list">
                        <li class="nav-mob-list__item">
                            <a class="btn btn--things" href="#" @disabled(false)>Все вещи</a>
                        </li>
                        <li class="nav-mob-list__item">
                            <a class="btn btn--box" href="#" @disabled(false)>Коробки</a>
                        </li>
                    </ul>
                </nav>

                <nav class="header-nav">
                    <ul class="header-nav__list header-nav-list">
                        <li class="header-nav-list__item">
                            <a class="btn btn--things" href="#" @disabled(false)>1</a>
                        </li>
                        <li class="header-nav-list__item">
                            <a class="btn btn--box" href="#" @disabled(false)>2</a>
                        </li>
                    </ul>
                </nav>
            </header>

            <main class="main"></main>

            <footer class="footer">
                <span>fuutert</span>
                <nav class="footer-nav">
                    <ul class="footer-nav__list footer-nav-list">
                        <li class="footer-nav-list__item">1</li>
                        <li class="footer-nav-list__item">2</li>
                        <li class="footer-nav-list__item">3</li>
                    </ul>
                </nav>
            </footer>
        </div>
    </body>
</html>
