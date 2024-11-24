@extends('admin.layouts.show')

@section('title', 'Изменить пароль')

@section('content')  
  @include('admin.partials.header')

  <main class="main fixed-container">
    @include('admin.partials.main-top')

    <div class="password">
      <div class="form password__form">
        <form class="form__form" action="{{ route('admin.password.update', auth('admin')->user()->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="form__inner">
            <label class="form__label" for="name">Имя:</label>
            <input class="form__input @error('name') form__input--errror @enderror" 
                  id="name"
                  type="name"
                  name="name"
                  value={{ old('name', auth('admin')->user()->name) }}
            >
          </div>
  
          @error('name')
            <p class="form__error">{{ $message }}</p>
          @enderror
  

          <div class="form__inner">
            <label class="form__label" for="password">Новый пароль:</label>
            <input class="form__input @error('password') form__input--errror @enderror" 
                  id="password"
                  type="password"
                  name="password"
            >
          </div>
  
          @error('password')
            <p class="form__error">{{ $message }}</p>
          @enderror
  
          <div class="form__inner">
            <label class="form__label" for="password_confirmation">Подтверждение пароля:</label>
            <input class="form__input @error('password_confirmation') form__input--errror @enderror"
                  id="password_confirmation" 
                  type="password" 
                  name="password_confirmation"
            >
          </div>
  
          @error('password_confirmation')
            <p class="form__error">{{ $message }}</p>
          @enderror

          @error('err')
            <p class="form__error">{{ $errors->first('err') }}</p>
          @enderror
  
          <div class="form__btn-container">
            <button class="form__btn btn">Применить</button>
          </div>
        </form>
      </div>
    </div>
  </main>

  @include('admin.partials.footer')
@endsection