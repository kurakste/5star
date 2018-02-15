@extends('layouts.master')
@section('title', 'HotLine')
@section('content')

<div class="add-wrapper">
    
@foreach ($postersList as $poster)

<div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand">
  </div>
  <div class="mdl-card__supporting-text">
    <img class='post-prev' src="{{$poster}}" alt=""> 
    <p></p>
  </div>
  <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" 
           href="getposter?poster={{$poster}}&id={{$object_id}}"
        >
        Скачать
    </a>
</div>
</div>

@endforeach

@endsection
</div>
