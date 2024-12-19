@extends('layouts.show')

@section('title', 'Подтверждение')

@section('content')
  <main class="main fixed-container">
    <div class="alert">
      <div class="alert__card">
        <span class="alert__text">{{ $text }}</span>
        
        <div class="alert__btn-container">
          <a class="alert__cencel" href="{{ $cencel }}">Отменить</a>

          <form action="{{ route('avatar.destroy', auth('web')->user()->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <input type="hidden" name="delete" value="true">
  
            <button class="alert__delete">Удалить</button>
          </form>
        </div>
      </div>
    </div>
  </main>
  
  @vite([ 
    //'resources/js/show-avatar.js'
  ])
@endsection