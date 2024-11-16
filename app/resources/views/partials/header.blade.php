<header class="header">
  <div class="header__left">
      <h1 class="header__title">Мои вещи</h1>
  </div>

  <nav class="nav-mob">
      <ul class="nav-mob__list nav-mob-list">
          <li class="nav-mob-list__item">
              <a class="btn btn--things" href="{{ route('things.index') }}" @disabled(false)>Все вещи</a>
          </li>
          <li class="nav-mob-list__item">
              <a class="btn btn--box" href="{{ route('boxes.index') }}" @disabled(false)>Коробки</a>
          </li>
      </ul>
  </nav>

  <div class="header__center">
      <nav class="header-nav">
          <ul class="header-nav__list header-nav-list">
              <li @class(['header-nav-list__item', 'a--active' => request()->routeIs('home')])>
                  <a class="header-nav-list__link" href="{{ route('home') }}">Главная</a>
              </li>
              <li @class(['header-nav-list__item', 'a--active' => request()->routeIs('things.index')])>
                  <a class="header-nav-list__link" href="{{ route('things.index') }}">Вещи</a>
              </li>
              <li @class(['header-nav-list__item', 'a--active' => request()->routeIs('boxes.index')])>
                  <a class="header-nav-list__link" href="{{ route('boxes.index') }}">Коробки</a>
              </li>
              <li @class(['header-nav-list__item', 'a--active' => request()->routeIs('search.index')])>
                  <a class="header-nav-list__link" href="{{ route('search.index') }}">Поиск</a>
              </li>
              <li @class(['header-nav-list__item', 'a--active' => request()->routeIs('setting')])>
                <a class="header-nav-list__link" href="{{ route('setting') }}">Настройки</a>
            </li>
          </ul>
      </nav>
  </div>

  <div class="header__right header-right">
      <span class="header-right__text">lexx@gmail.com</span>
      <span class="header-right__text">выход</span>
  </div>
</header>