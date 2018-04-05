@extends('layouts.master')
@section('title', 'HotLine')
@section('content')

<div class="add-wrapper">
    
     <a class='bBack' href="/objects"><img src="icon/left-80.png" alt="" width='60' /></a>


@foreach ($posters as $poster)
    @if ($poster->formats->where('format','prev')->first())   
    <!-- Если в папке нет привьюшки - обробатавать не будет.  -->

         <!-- =============== nest ========================================= --> 
                <div class="poster-container">
                  <div class="poster-fright">
                      <div class="">
                        <img class='post-prev' src="{{$poster->formats->where('format','prev')->first()->path}}" alt=""> 
                      </div>
                  </div>
                    <div class="poster-fleft">
                    <ul>
                        @foreach ($poster->formats as $format)
                            @if ($format->format != 'prev')
                            <!-- Усли это привьюшка в список не выводим -->
                                <li>
                                    <a href="getposter?poster={{$format->id}}&id={{$object_id}}">
                                        
                                        <img id='p-save-icon' src="icon/save-80.png" alt="" />
                                        {{$format->format}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
         <!-- =============== nest ========================================= --> 
    @endif

@endforeach

@endsection
</div>
