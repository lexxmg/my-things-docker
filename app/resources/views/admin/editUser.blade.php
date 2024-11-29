@extends('admin.layouts.show')

@section('title', 'Редактировать пользователя')

@section('content')  
  @include('admin.partials.header')

  <main class="main fixed-container">
    @include('admin.partials.main-top')

    <p class="edit-user__name">{{ $name }}</p>

    <div class="edit-user">
      <div class="form edit-user__form">
        <form class="form__form" action="{{ route('admin.user.update', $id) }}" method="POST">
          @csrf
          @method('PUT')
         
          <div class="form__inner">
            <label class="form__label" for="password">Новый пароль:</label>
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
            >{{ $description }}</textarea>
          </div>

          <div class="form__inner form-inner-checkbox">
            <label class="form-inner-checkbox__label" for="isAdmin">Показывать администрирование:</label>
            <input class="form-inner-checkbox__input @error('isAdmin') form__input--errror @enderror" 
                  id="isAdmin"
                  type="checkbox"
                  name="isAdmin"
                  @checked($admin)
            >
          </div>
  
          @error('password_confirmation')
            <p class="form__error">{{ $message }}</p>
          @enderror

          @error('err')
            <p class="form__error">{{ $errors->first('err') }}</p>
          @enderror
  
          <div class="form__btn-container edit-user__btn-container">
            <button class="form__btn btn">Применить</button>
          </div>
        </form>

        <div class="edit-user__btn-container-bottom">
          <a class="edit-user__link btn destroy--red" href="{{ route('admin.user.show', $id) }}">Удалить плользователя</a>
        </div>
      </div>
    </div>
  </main>

  @include('admin.partials.footer')
@endsection