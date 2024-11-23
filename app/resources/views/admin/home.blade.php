@extends('admin.layouts.app')

@section('title', 'Администрирование')

@section('content')  
  @include('admin.partials.header')

  <main class="main fixed-container">
    <div class="main-top">
        <h2 class="main-top__title">Пользователи</h2>

        <a class="btn main-top__btn main-top-btn" href="#" aria-label="Добавить пользователя">
            <span class="main-top-btn__text">Добавить пользователя</span>
            <span class="main-top-btn__icon icon-plus"></span>
        </a>
    </div>
  </main>

  @include('admin.partials.footer')
@endsection