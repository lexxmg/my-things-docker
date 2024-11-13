@extends('layouts.show')

@section('title', 'Все веши')

@section('content')  
  @include('partials.header')

  <main class="main fixed-container">
    @include('partials.main-top')
    <p>здесь должны быть все вещи</p>
  </main>

  @include('partials.footer')
@endsection