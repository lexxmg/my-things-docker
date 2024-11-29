@extends('layouts.show')

@section('title', 'Настройки')

@section('content')  
  @include('partials.header')

  <main class="main fixed-container">
    @include('partials.main-top')
    
    <div class="setting">
      <div class="setting__top">
        <span class="setting__text">Текущий пользователь:</span>
        <span class="setting__text">{{ auth('web')->user()->name }}</span>
      </div>

      <ul class="setting__ul">
        @if ($isAdmin)
          <li class="setting__items">
            <a class="setting__link btn setting--btn remove-btn-js admin-btn-js"
              >Администрирование
            </a>
          </li>
        @endif
        <li class="setting__items">
          <a class="setting__link btn setting--btn remove-btn-js" href="{{ route('password.index') }}">Сменить пароль</a>
        </li>
        <li class="setting__items">
          <a class="setting__link btn setting--btn remove-btn-js" href="{{ route('password.create') }}">Выйти на всех устройствах</a>
        </li>
        <li class="setting__items hidden">
          <a class="setting__link btn setting--btn remove-btn-js" href="{{ route('logout') }}">Выход</a>
        </li>
        <li class="setting__items">
          <a class="setting__link btn setting--btn remove-btn-js" href="{{ route('destroy.index') }}">Удалить аккаунт</a>
        </li>
      </ul>
    </div>
  </main>

  @include('partials.footer')
@endsection