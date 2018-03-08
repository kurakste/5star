@extends('layouts.master')
@section('title', 'HotLine')
@section('content')

<div class="add-wrapper">
    
    <button  
            class="backButton mdl-button mdl-js-button mdl-button--fab" >
     <a href="/objects"><i class="material-icons">keyboard_arrow_left</i></a> 
    </button>
@foreach ($postersList as $poster)

     <!-- =============== nest ========================================= --> 
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title mdl-card--expand">
                <img class='post-prev' src="{{$poster}}" alt=""> 
              </div>
              <div class="mdl-card__actions mdl-card--border">
              </div>
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" 
                       href="getposter?poster={{$poster}}&id={{$object_id}}">
                    А0
                </a>
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" 
                       href="getposter?poster={{$poster}}&id={{$object_id}}">
                    A1
                </a>
            </div>
     <!-- =============== nest ========================================= --> 

@endforeach

@endsection
</div>
