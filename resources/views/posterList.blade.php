@extends('layouts.master')
@section('title', 'HotLine')
@section('content')

<div class="add-wrapper">
    
     <a class='bBack' href="/objects"><img src="icon/left-80.png" alt="" width='60' /></a>


@foreach ($postersList as $poster)

     <!-- =============== nest ========================================= --> 
            <div class="poster-container">
              <div class="poster-fleft">
                  <div class="">
                    <img class='post-prev' src="{{$poster}}" alt=""> 
                  </div>
              </div>
                <div class="poster-fright">
                <ul>
                    <li><a href="getposter?poster={{$poster}}&id={{$object_id}}">А0</a></li>
                    <li><a href="getposter?poster={{$poster}}&id={{$object_id}}">A1</a></div></li>
                </ul>

            </div>
     <!-- =============== nest ========================================= --> 

@endforeach

@endsection
</div>
