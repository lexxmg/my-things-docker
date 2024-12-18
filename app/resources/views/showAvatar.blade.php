@extends('layouts.show')

@section('title', 'Аватар')

@section('content')
  @include('partials.placeholder-show')
  @include('partials.header')

  <main class="main fixed-container">
    @include('partials.main-top')

    <div class="show-avatar">
      <div class="show-avatar__top">
        <a class="show-avatar__close icon-remove" href="{{ $url }}" aria-label="Закрыть"></a>

        <form action="{{ route('avatar.edit', auth('web')->user()->id) }}" method="POST">
          @csrf
          @method('GET')

          <button class="show-avatar__edit icon-edit" aria-label="Редактировать"></button>
        </form>

        <form action="{{ route('avatar.destroy', auth('web')->user()->id) }}" method="POST">
          @csrf
          @method('DELETE')

          <button class="show-avatar__delete icon-trash" aria-label="Удалить"></button>
        </form>
      </div>
      <div class="show-avatar__img-container">
        <img class="show-avatar" src="{{ $image }}" alt="{{ $alt }}">
      </div>
      <div class="show-avatar__btn-container"></div>
    </div>
  </main>
  
  @vite([ 
    'resources/js/show-avatar.js'
  ])
  
  @include('partials.footer')
@endsection