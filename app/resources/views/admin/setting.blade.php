@extends('admin.layouts.show')

@section('title', 'Настройки администратора')

@section('content')  
  @include('admin.partials.header')

  <main class="main fixed-container">
    @include('admin.partials.main-top')
    
    <div class="setting">
      <ul class="setting__ul">
        <li class="setting__items">
          <a class="setting__link btn setting--btn remove-btn-js" href="{{ route('admin.password.index') }}">Сменить пароль</a>
        </li>
        <li class="setting__items hidden">
          <a class="setting__link btn setting--btn remove-btn-js" href="{{ route('admin.logout') }}">Выход</a>
        </li>
      </ul>
    </div>
  </main>

  @include('admin.partials.footer')
@endsection