@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')
  <div class="login">
    <div class="form login__form">
      <form class="form__form" action="{{ route('authenticate') }}" method="POST">
        @csrf
        <div class="form__inner">
          <label class="form__label" for="name">Имя:</label>
          <input class="form__input @error('name') form__input--errror @enderror" 
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
          >
        </div>

        @error('name')
          <p class="form__error">{{ $message }}</p>
        @enderror

        <div class="form__inner">
          <label class="form__label" for="password">Пароль:</label>
          <input class="form__input @error('password') form__input--errror @enderror"
                id="password" 
                type="password" 
                name="password"
          >
        </div>

        @error('password')
          <p class="form__error">{{ $message }}</p>
        @enderror

        @error('err')
          <p class="form__error">{{ $errors->first('err') }}</p>
        @enderror

        <div class="form__btn-container">
          <button class="form__btn btn">Войти</button>
        </div>
      </form>
    </div>
  </div>
@endsection