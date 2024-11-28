@extends('admin.layouts.app')

@section('title', 'Администрирование')

@section('content')  
  @include('admin.partials.header')

  <main class="main fixed-container">
    <div class="main-top">
        <h2 class="main-top__title">Пользователи</h2>

        <a class="btn main-top__btn main-top-btn" href="{{ route('admin.user.create') }}" aria-label="Добавить пользователя">
            <span class="main-top-btn__text">Добавить пользователя</span>
            <span class="main-top-btn__icon icon-plus"></span>
        </a>
    </div>

    {{-- @foreach ($users as $item)
      <p>{{ $item->name }}</p>
    @endforeach --}}

    {{-- <div>{{ $users->links() }}</div> --}}
    

    <div class="home user-js">
      <div class="home__card">
        <img class="home__img" src="" alt="">

        <div class="home__inner">
          <div class="home__top">
            <h3 class="home__title">Имя:</h3>
            <span class="home__text">{{ 'имя' }}</span>

            <div class="home__arrow icon-chevron-right"></div>
          </div>

          <div class="home__content">
            <p class="home__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ipsam assumenda, nostrum iusto eaque quis expedita distinctio neque at, molestias cupiditate! Nam sunt labore quia facere ab beatae pariatur ipsum.</p>
          </div>

          <a class="home__link" href="#" aria-label="Открыть карточку"></a>
        </div>
      </div>
    </div>
  </main>

  @include('admin.partials.footer')
@endsection