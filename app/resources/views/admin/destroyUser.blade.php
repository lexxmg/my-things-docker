@extends('admin.layouts.show')

@section('title', 'Удалить пользователя')

@section('content')  
  @include('admin.partials.header')

  <main class="main fixed-container">
    @include('admin.partials.main-top')

    <div class="destroy-user">
      <p>Удалить пользователя {{ $id }} Пользовотель будет бузвазвратно удалён, продолжить?</p>
     
      <form action="{{ route('admin.user.destroy', $id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button>Удалить</button>
      </form>
    </div>
  </main>

  @include('admin.partials.footer')
@endsection