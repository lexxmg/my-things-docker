@extends('layouts.show')

@section('title', 'Коробки')

@section('content')  
  @include('partials.header')

  <main class="main fixed-container">
    @include('partials.main-top')
    <p>здесь должны быть коробки</p>
  </main>

  @include('partials.footer')
@endsection