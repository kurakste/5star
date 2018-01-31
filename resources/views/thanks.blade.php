
@extends('layouts.fbmaster')
@section('title', '5StarService')

@section('content')
    <style>
        .wrapper {
            height: 100%;
            width: 100%;
        }
        h1 {
            font-size: 5vw;
            text-transform: uppercase;
            margin-top: 35%;
            margin-lef:10%;
            margin-right:10%;
            text-align: center;
        }

        @media (orientation: landscape) {
            h1 {
                margin-top: 22%;
            }
        }
    </style>
    <div class="wrapper">
        <h1> Огромное спасибо за вашу помощь </h1>
    </div>
@endsection
