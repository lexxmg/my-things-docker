@extends('layouts.show')

@section('title', 'Загрузить аватар')

@section('content')  
  @include('partials.header')

  <main class="main fixed-container">
    @include('partials.main-top')

    <div class="add-avatar">
      <p class="add-avatar__text">
        Здесь можно утановить аватар (отобразаеться только в десктопной версии)
      </p>

      <div class="form add-avatar__form">
        <form class="form__form" action="{{ route('avatar.update', ['avatar' => auth('web')->user()->id]) }}" method="POST"  enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form__inner">
            <label class="form__label" for="image">Добавить фото:</label>
            <input class="form__input"
                  id="image" 
                  type="file"
                  name="image"
                  accept="image/*"
                  capture="user"
            >
          </div>
  
          <div class="form__btn-container add-avatar__btn-container">
            <button class="form__btn btn add-avatar__btn btn-js">Загрузить</button>
            <a class="btn setting--btn" href="{{ route('setting') }}">Отмена</a>
          </div>
        </form>
      </div>
    </div>
  </main>

  @vite([ 
    'resources/js/add-avatar.js'
  ]) 
  @include('partials.footer')
@endsection