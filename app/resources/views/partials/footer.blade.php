<footer class="footer">
  <nav class="footer-nav">
      <ul class="footer-nav__list footer-nav-list">
          <li @class(['footer-nav-list__item', 'a--active' => request()->routeIs('home')])>
              <span class="footer-nav-list__text icon-home"></span>
              <a href="{{ route('home') }}" class="footer-nav-list__link">Главная</a>
          </li>
          <li @class(['footer-nav-list__item', 'a--active' => false])">
              <span class="footer-nav-list__text icon-search"></span>
              <a href="" class="footer-nav-list__link">Поиск</a>
          </li>
          <li @class(['footer-nav-list__item', 'a--active' => false])">
              <span class="footer-nav-list__text icon-settingsfour-gearsalt"></span>
              <a href="" class="footer-nav-list__link">Настройки</a>
          </li>
      </ul>
  </nav>

  <span class="footer__copy">&copy; lexxmg</span>
</footer>