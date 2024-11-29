@extends('admin.layouts.show')

@section('title', 'Удалить пользователя')

@section('content')  
  @include('admin.partials.header')

  <main class="main fixed-container">
    @include('admin.partials.main-top')

    <div class="destroy">
      <p class="destroy__text">Удалить пользователя: {{ $user->name }}</p>

      <div class="form destroy__form">
        <p class="form__destroy-text">
          Пользовотель "{{ $user->name }}" безвозвратно будет удалён со всеми данными и фотографиями,
          продолжить?
        </p>

        <form class="form__form" action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
          @csrf
          @method('DELETE')
  
          <div class="form__btn-container destroy__btn-container">
            <button class="form__btn btn destroy__btn btn-destroy--red">Удалить</button>
            <a class="btn setting--btn btn-destroy--green" href="{{ route('admin.user.index') }}">Отмена</a>
          </div>
        </form>
      </div>
    </div>
  </main>

  @include('admin.partials.footer')
@endsection