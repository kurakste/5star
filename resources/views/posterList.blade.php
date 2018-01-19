@extends('layouts.master')
@section('title', '5StarService')
@section('content')


        @foreach ($postersList as $poster)
            <p><a href="getposter?poster={{$poster}}&id={{$object_id}}"><img src="{{$poster}}" alt="" width="300px" style="margin: 5px"></a></p>

        @endforeach

@endsection