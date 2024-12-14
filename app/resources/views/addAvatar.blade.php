@extends('layouts.show')

@section('title', 'Загрузить аватар')

@section('content')  
  @include('partials.header')

  <main class="main fixed-container">
    @include('partials.main-top')

    <div class="add-avatar">
      <p class="add-avatar__text">
        Здесь можно утановить аватар:
      </p>
      
      <div class="form add-avatar__form">
        <form class="form__form form__form-js" action="{{ route('avatar.update', ['avatar' => auth('web')->user()->id]) }}" method="POST"  enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div id="previev"></div>
          
          <input type="hidden" name="base64_image">

          <div class="form__inner add-avatar__select-foto">
            <label class="btn add-avatar--btn-full" for="image">Выбрать фото</label>
            <input class="visually-hidden"
                  id="image" 
                  type="file"
                  name="image[]"
                  accept="image/*"
                  capture="user"
            >
          </div>

          <div class="form__inner add-avatar__camera-foto">
            <label class="add-avatar__icon-label icon-camera" for="image-camera">
              <span class="add-avatar__icon-text">Камера</span>
            </label>
            <input class="visually-hidden"
                  id="image-camera" 
                  type="file"
                  name="image[]"
                  accept="image/*"
                  capture="user"
            >

            <label class="add-avatar__icon-label icon-folderalt" for="image-folder">
              <span class="add-avatar__icon-text">Папка</span>
            </label>
            <input class="visually-hidden"
                  id="image-folder" 
                  type="file"
                  name="image[]"
                  accept="image/*"
            >
          </div>
  
          <div class="form__btn-container add-avatar__btn-container">
            <button class="form__btn btn add-avatar__btn btn-js" disabled>Загрузить</button>
            <a class="btn setting--btn" href="{{ route('setting') }}">Отмена</a>
          </div>
        </form>
      </div>
    </div>
  </main>

  @vite([ 
    'resources/js/add-avatar.js'
  ])
  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    

  @include('partials.footer')
@endsection