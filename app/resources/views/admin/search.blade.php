@extends('admin.layouts.show')

@section('title', 'Поиск')

@section('content')  
  @include('admin.partials.header')

  <main class="main fixed-container">
    @include('admin.partials.main-top')

    <div class="search">
      <div class="form search__form">
        <form class="form__form form-js">
          @csrf
        
          <div class="form__inner search__form-inner">
            <span class="search__icon-search icon-search"></span>
            
            <input class="form__input search__form-input"
                  type="text"
                  name="search"
                  placeholder="поиск..."
            >
          </div>
        </div>
    </div>

    <div class="search-js"></div>
  </main>

  @include('admin.partials.footer')
@endsection