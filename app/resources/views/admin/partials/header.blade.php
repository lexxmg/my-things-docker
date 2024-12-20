<header class="header">
  <div class="header__left">
      <h1 class="header__title">Администрирование</h1>
  </div>

  <div class="header__center">
      <nav class="header-nav">
          <ul class="header-nav__list header-nav-list">
              <li @class(['header-nav-list__item', 'a--active' => request()->routeIs('admin.user.index')])>
                  <a class="header-nav-list__link" href="{{ route('admin.user.index') }}">Главная</a>
              </li>
              <li @class(['header-nav-list__item', 'a--active' => request()->routeIs('admin.search')])>
                <a class="header-nav-list__link" href="{{ route('admin.search') }}">Поиск</a>
              </li>
              <li @class(['header-nav-list__item', 'a--active' => request()->routeIs('admin.setting')])>
                <a class="header-nav-list__link" href="{{ route('admin.setting') }}">Настройки</a>
            </li>
          </ul>
      </nav>
  </div>

  <div class="header__right header-right">
      <span class="header-right__text">{{ auth('admin')->user()->name }}</span>
      <a class="header-right__link admin-close-btn-js" href="{{ route('admin.logout') }}">
        <span class="header-right__text">выход</span>
      </a>
  </div>

  @vite([ 
    'resources/js/admin-setting.js'
  ]) 
</header>