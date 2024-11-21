@extends('layouts.show')

@section('title', 'Удаление аккаунта')

@section('content')  
  @include('partials.header')

  <main class="main fixed-container">
    @include('partials.main-top')

    <div class="destroy">
      <p class="destroy__text">
        Аккаунт безвозвратно будет удалён со всеми данными и фотографиями,
        для продолжения необходимо ввести текущей пароль, продолжить?
      </p>

      <div class="form destroy__form">
        <form class="form__form" action="{{ route('destroy', ['id' => auth('web')->user()->id]) }}" method="POST">
          @csrf
          @method('DELETE')

          <div class="form__inner">
            <label class="form__label" for="password">Текущий пароль:</label>
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
  
          <div class="form__btn-container destroy__btn-container">
            <button class="form__btn btn destroy__btn btn-destroy--red">Удалить</button>
            <a class="btn setting--btn btn-destroy--green" href="{{ route('setting') }}">Отмена</a>
          </div>
        </form>
      </div>
    </div>
  </main>

  @include('partials.footer')
@endsection