@extends('admin.layouts.show')

@section('title', 'Поиск')

@section('content')  
  @include('admin.partials.header')

  <main class="main fixed-container">
    @include('admin.partials.main-top')

    <div class="search search-js">
      <div class="csrf-js">{{ csrf_token() }}</div>
    </div>
  </main>

  @include('admin.partials.footer')
@endsection