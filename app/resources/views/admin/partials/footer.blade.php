<footer class="footer">
  <nav class="footer-nav">
      <ul class="footer-nav__list footer-nav-list">
          <li @class(['footer-nav-list__item', 'a--active' => request()->routeIs('admin.user.index')])>
                <a class="footer-nav-list__link" href="{{ route('admin.user.index') }}">
                    <span class="footer-nav-list__text icon-home"></span>Главная
                </a>
          </li>
          <li @class(['footer-nav-list__item', 'a--active' => request()->routeIs('admin.search')])>
                <a class="footer-nav-list__link" href="{{ route('admin.search') }}">
                    <span class="footer-nav-list__text icon-search"></span>Поиск
                </a>
          </li>
          <li @class(['footer-nav-list__item', 'a--active' => request()->routeIs('admin.setting')])>
                <a class="footer-nav-list__link" href="{{ route('admin.setting') }}">
                    <span class="footer-nav-list__text icon-settingsfour-gearsalt"></span>Настройки
                </a>
          </li>
      </ul>
  </nav>

  <span class="footer__copy">&copy; lexxmg (2024)</span>
</footer>