@extends('layouts.show')

@section('title', 'Поиск')

@section('content')  
  @include('partials.header')

  <main class="main fixed-container">
    @include('partials.main-top')
    <p>Аккаунт безвозвратно будет удалён со всеми данными и фотографиями</p>

    <form class="form__form" action="{{ route('destroy', ['id' => auth('web')->user()->id]) }}" method="POST">
      @csrf
      @method('DELETE')

      <button class="setting__link btn setting--btn" >Удалить аккаунт</button>
    </form>
    
    <a class="setting__link btn setting--btn" href="{{ route('setting') }}">Отмена</a>
  </main>

  @include('partials.footer')
@endsection