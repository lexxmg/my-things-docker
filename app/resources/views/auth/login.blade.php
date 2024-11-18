@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')
  <div class="login">
    <div class="form login__form">
      <form class="form__form" action="{{ route('authenticate') }}" method="POST">
        @csrf
        <div class="form__inner">
          <label class="form__label" for="name">Имя:</label>
          <input class="form__input" id="name" type="text" name="name">
        </div>

        @error('mail')
          <p>{{ $errors->first('mail') }}</p>
        @enderror

        <div class="form__inner">
          <label class="form__label" for="password">Пароль:</label>
          <input class="form__input" id="password" type="password" name="password">
        </div>

        <div class="form__btn-container">
          <button class="form__btn">Войти</button>
        </div>
      </form>
    </div>
  </div>
@endsection