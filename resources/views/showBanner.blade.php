@extends('layouts.master')
@section('title', '5StarService')
@section('content')

    <div>
        <img src="/banners/{{$bannerFilename}}" style="width:90%; margin: 2px"  alt="">
    </div>

    <div>
        <a class="btn btn-primary btn-sm btn_cl" href="/banner/change?obj_id={{$obj_id}}" role="button">Загрузить новый</a>
    </div>

@endsection

