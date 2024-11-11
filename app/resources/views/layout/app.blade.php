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
                <div class="header__left">
                    <h1 class="header__title">Мои вещи</h1>
                </div>

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

                <div class="header__center">
                    <nav class="header-nav">
                        <ul class="header-nav__list header-nav-list">
                            <li class="header-nav-list__item">
                                <a class="header-nav-list__link" href="#">Вещи</a>
                            </li>
                            <li class="header-nav-list__item">
                                <a class="header-nav-list__link" href="#">Коробки</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="header__right header-right">
                    <span class="header-right__text">lexx@gmail.com</span>
                    <span class="header-right__text">выход</span>
                </div>
            </header>

            <main class="main fixed-container">
                <div style="height: 10000px;">
                    <p>
                        Lorem ipsum dolor sit, amet consectetur
                        dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
                        dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
                        dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
                        dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
                        dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
                        dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!

                        dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
                        dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
                        dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
                        dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!

                    </p>
                </div>
            </main>

            <footer class="footer">
                <nav class="footer-nav">
                    <ul class="footer-nav__list footer-nav-list">
                        <li class="footer-nav-list__item">
                            <span class="footer-nav-list__text icon-home"></span>
                            <a href="" class="footer-nav-list__link">Главная</a>
                        </li>
                        <li class="footer-nav-list__item">
                            <span class="footer-nav-list__text icon-search"></span>
                            <a href="" class="footer-nav-list__link">Поиск</a>
                        </li>
                        <li class="footer-nav-list__item">
                            <span class="footer-nav-list__text icon-settingsfour-gearsalt"></span>
                            <a href="" class="footer-nav-list__link">Настройки</a>
                        </li>
                    </ul>
                </nav>
            </footer>
        </div>
    </body>
</html>
