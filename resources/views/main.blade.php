@extends('layouts.master')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}" />

@section('title', 'HotLine')
@section('content')

<!--
    <div class="container-fluid">

        <div class="row header">
            <div class="col-12 text-center banner">
                <p>Hellow, {{$user->name}}.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="bricks">
                    <div class="text-center border">
                        <i class="menu-item">Инфо</i>
                        <div class="icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                    </div>
                    <a href="/info" class="links"></a>
                </div>
            </div>
            <div class="col-6">
                <div class="bricks">
                    <div class="text-center border">
                        <i class="menu-item">Настройки</i>
                        <div class="icon">
                            <i class="fas fa-cog"></i>
                        </div>
                    </div>
                    <a href="/getsettings" class="links"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="text-center bricks">
                    <div class="text-center border">
                        <i class="menu-item">Оъекты</i>
                        <div class="icon">
                            <i class="far fa-address-card"></i>
                        </div>
                    </div>
                    <a href="/objects" class="links"></a>
                </div>
            </div>
            <div class="col-6">
                <div class="text-center bricks">
                    <div class="text-center border">
                        <i class="menu-item">Отзывы</i>
                        <div class="icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div> container -->


@endsection
