<footer class="footer">
  <nav class="footer-nav">
      <ul class="footer-nav__list footer-nav-list">
          <li @class(['footer-nav-list__item', 'a--active' => request()->routeIs('home')])>
                <a class="footer-nav-list__link" href="{{ route('home') }}">
                    <span class="footer-nav-list__text icon-home"></span>Главная
                </a>
          </li>
          <li @class(['footer-nav-list__item', 'a--active' => request()->routeIs('search.index')])">
                <a class="footer-nav-list__link" href="{{ route('search.index') }}">
                    <span class="footer-nav-list__text icon-search"></span>Поиск
                </a>
          </li>
          <li @class(['footer-nav-list__item', 'a--active' => request()->routeIs('setting')])">
                <a class="footer-nav-list__link" href="{{ route('setting') }}">
                    <span class="footer-nav-list__text icon-settingsfour-gearsalt"></span>Настройки
                </a>
          </li>
      </ul>
  </nav>

  <span class="footer__copy">&copy; lexxmg (2024)</span>
</footer>