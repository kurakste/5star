@extends('layouts.master')
@section('title', 'HotLine')
@section('content')

<div class="add-wrapper">
    
     <a class='bBack' href="/objects"><img src="icon/left-80.png" alt="" width='60' /></a>

    <div id='offer'>
        <p class='p-in-poster'>Ниже каталог готовых постеров.</p>
        <p class='p-in-poster'>Выберите дизайн постера который подходит для вашей организации. </p>
        <p class='p-in-poster'>Выберите подходящий для вас размер. Скачайте необходимый для печати размер 
           с встоенным QR кодом. </p>
        <p class='p-in-poster'>Обратите вниманиe, размер файлов может быть очень большим.</p> 

    </div>


@foreach ($posters as $poster)

         <!-- =============== nest ========================================= --> 
                <div class="poster-container">
                  <div class="poster-fright">
                      <div class="">
                        <img class='post-prev' src="{{$poster['prev']}}" alt=""> 
                      </div>
                  </div>
                  <div class="poster-fleft">
                    <ul>
                        @foreach ($poster['formats'] as $format)
                                <li>
                                    <a href="getposter?poster={{$poster['name']}}&format={{$format['id']}}&obj_id={{$object_id}}">
                                        
                                        <img id='p-save-icon' src="icon/download.png" alt="" />
                                        {{$format['id']}}</a>
                                </li>
                        @endforeach
                    </ul>
                </div>
            </div> <!-- Poster container -->
         <!-- =============== nest ========================================= --> 
@endforeach

</div>
@endsection
