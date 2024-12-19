@extends('layouts.show')

@section('title', 'Аватар')

@section('content')
  @include('partials.placeholder-show')
  @include('partials.header')

  <main class="main fixed-container">
    @include('partials.main-top')

    <div class="show-avatar">
      <div class="show-avatar__top show-avatar-top">
        <a class="show-avatar-top__btn show-avatar--close icon-remove" href="{{ $url }}" aria-label="Закрыть"></a>

        <div class="show-avatar__inner">
          <form action="{{ route('avatar.edit', $userId) }}" method="POST">
            @csrf
            @method('GET')

            <button class="show-avatar-top__btn show-avatar--edit icon-edit" aria-label="Редактировать"></button>
          </form>

          <form action="{{ route('avatar.destroy', $userId) }}" method="POST">
            @csrf
            @method('DELETE')

            <button class="show-avatar-top__btn show-avatar--delete icon-trash" aria-label="Удалить"></button>
          </form>
        </div>
      </div>
      <div class="show-avatar__img-container">
        <img class="show-avatar__img" src="{{ $image }}" alt="{{ $alt }}">
      </div>
      <div class="show-avatar__btn-container">
        <form action="{{ route('avatar.edit', $userId) }}" method="POST">
          @csrf
          @method('GET')

          <button class="show-avatar__edit btn">Редактировать</button>
        </form>

        <form action="{{ route('avatar.destroy', $userId) }}" method="POST">
          @csrf
          @method('DELETE')

          <button class="show-avatar__delete btn  btn-mod--red">Удалить</button>
        </form>
      </div>
    </div>
  </main>
  
  @vite([ 
    'resources/js/show-avatar.js'
    //'resources/js/placeholder-show.js',
  ])
  
  @include('partials.footer')
@endsection