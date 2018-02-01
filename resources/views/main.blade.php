@extends('layouts.master')
<style>

    .container-fluid {
        background-color:#c8d7d4;
    }
    .row {
        padding: 2px;
    }
    .bricks {
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        position: relative;
        margin: 5px;
        height: 30vh;
        text-transform: uppercase;
        color: #27282d;
        background-color: #fbfbfb;
    }

    .links {
        display:block;
        padding-top: 7vh;
        position: absolute;
        top:1.7vh;
        left: 2vw;
        border: solid #aa9e72 1px;
        height: 90%;
        width:90%;
    }

    .border {
        padding-top: 7vh;
        position: absolute;
        top:1.7vh;
        left: 2vw;
        border: solid #aa9e72 1px;
        height: 90%;
        width:90%;
    }

    .bricks:hover {
        background-color: #6b9dbb;
    }
    .header {
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        height: 28px;
        margin-top:4px;
        margin-bottom: 4px;
    }

    .col-6 {
        padding-left: 2px;
        padding-right: 2px;
    }

    .banner {
        font-size: 24px;
        text-transform: uppercase;
        color: #afa376;
    }


    .icon {
        color:#afa376;
        font-size: 60px;
    }



    @media (orientation: landscape) {
        .bricks {

            height: 30vh;
        }

        .border {
            padding-top: 2vh;
        }

        .icon {
            font-size: 50px;
        }

        .header {
            margin-top:4px;
            margin-bottom: 9px;
        }

    }

    @media (max-width: 380px) {
        .banner {
            font-size: 18px;
        }

    }

</style>
@section('title', 'HotLine')
@section('content')
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


    </div> <!--container -->


@endsection
