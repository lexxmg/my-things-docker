@extends('layouts.app')

@section('title', 'Мои вещи')

@section('content')  
  @include('partials.header')

  <main class="main fixed-container">
    <div class="main-top">
        <h2 class="main-top__title">Места</h2>

        <a class="btn main-top__btn main-top-btn" href="#" aria-label="Добавить место">
            <span class="main-top-btn__text">Добавить место</span>
            <span class="main-top-btn__icon icon-plus"></span>
        </a>
    </div>
    @foreach ($places as $item)
        <span>{{ $item }}</span>
        <p>
            Lorem ipsum dolor sit, amet consectetur
            dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
            dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
            dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
            dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
            dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
            dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!

            dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
            dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
            dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
            dipisicing elit. At suscipit dolorem ipsa ad maiores ipsam inventore sint itaque voluptatibus cumque beatae sequi optio id vel quia, numquam eveniet exercitationem modi!
        </p>
    @endforeach
  </main>

  @include('partials.footer')
@endsection