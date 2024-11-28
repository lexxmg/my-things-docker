@extends('admin.layouts.show')

@section('title', 'Создать пользователя')

@section('content')  
  @include('admin.partials.header')

  <main class="main fixed-container">
    @include('admin.partials.main-top')

    <div class="create-user">
      <div class="form create-user__form">
        <form class="form__form" action="{{ route('admin.user.store', auth('admin')->user()->id) }}" method="POST">
          @csrf
         
          <div class="form__inner">
            <label class="form__label" for="name">Имя:</label>
            <input class="form__input @error('name') form__input--errror @enderror" 
                  id="name"
                  type="text"
                  name="name"
                  value={{ old('name') }}
            >
          </div>
  
          @error('name')
            <p class="form__error">{{ $message }}</p>
          @enderror
  

          <div class="form__inner">
            <label class="form__label" for="password">Пароль:</label>
            <input class="form__input @error('password') form__input--errror @enderror" 
                  id="password"
                  type="text"
                  name="password"
            >
          </div>
  
          @error('password')
            <p class="form__error">{{ $message }}</p>
          @enderror
  
          <div class="form__inner">
            <label class="form__label" for="description">Описание:</label>
            <textarea class="form__textarea @error('description') form__input--errror @enderror"
                  id="description" 
                  type="text" 
                  name="description"
            >{{ old('description') }}</textarea>
          </div>

          <div class="form__inner form-inner-checkbox">
            <label class="form-inner-checkbox__label" for="isAdmin">Показывать администрирование:</label>
            <input class="form-inner-checkbox__input @error('isAdmin') form__input--errror @enderror" 
                  id="isAdmin"
                  type="checkbox"
                  name="isAdmin"
            >
          </div>
  
          @error('password_confirmation')
            <p class="form__error">{{ $message }}</p>
          @enderror

          @error('err')
            <p class="form__error">{{ $errors->first('err') }}</p>
          @enderror
  
          <div class="form__btn-container create-user__btn-container">
            <button class="form__btn btn">Создать</button>
          </div>
        </form>
      </div>
    </div>
  </main>

  @include('admin.partials.footer')
@endsection