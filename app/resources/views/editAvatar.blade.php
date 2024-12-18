@extends('layouts.show')

@section('title', 'Загрузить аватар')

@section('content')  
  @include('partials.placeholder-show')
  @include('partials.header')

  <main class="main fixed-container">
    @include('partials.main-top')

    <div class="edit-avatar">
      <p class="edit-avatar__text">
        Редактировать аватар:
      </p>
      
      <div class="form edit-avatar__form">
        <form class="form__form form__form-js" action="{{ route('avatar.update', auth('web')->user()->id) }}" method="POST"  enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div id="previev"></div>
          
          <input type="hidden" name="base64_image">

          <div class="form__btn-container edit-avatar__btn-container">
            <button class="form__btn btn edit-avatar__btn btn-js">Применить</button>
            <a class="btn setting--btn" href="{{ route('setting') }}">Отмена</a>
          </div>
        </form>
      </div>
    </div>
  </main>
  <script>const data = {"image": "{{ $image }}"}</script>
  <script src="/croppie/croppie.js"></script>
  @vite([ 
    //'resources/js/lib/croppie/croppie.min.js',
    'resources/js/edit-avatar.js'
  ])
  
  @include('partials.footer')
@endsection