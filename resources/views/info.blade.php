@extends('layouts.master')

@section('title', 'HotLine')
@section('content')
    <style type="text/css">

        #clientData ul, #objectsData ul{
            list-style-type:none;
            width:98%;
        }

        ul {
            padding-left:3%;
            padding-left:1%;
            list-style-type:none;
        }
        #clientData ul li, #objectsData ul li {
            border-bottom: solid 1px black;

        }
        .FlRight  {
            width:60%;
            text-align:left;
            overflow:hidden;
            max-height:1.4em;
        }


        #clientData ul li:last-child, #objectsData ul li:last-child {
            border-bottom: solid 0px gray;

        }
        .FlRight {
            float:right;
        }

        .wrapper  {
            font-size: 0.7rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            position: relative;
            margin: 5px;
            height: 30vh;
            text-transform: uppercase;
            color: #27282d;
            background-color: #fbfbfb;
        }

        .border {
            padding-top: 2vh;
            padding-left: 4vh;
            position: absolute;
            top:1.7vh;
            left: 2vw;
            border: solid #aa9e72 1px;
            height: 90%;
            width:95%;
        }

        .bBack {
            width: 50px;
            height: 50px;
            margin-top: 5vh;

        }
        .bBack:hover {
            box-shadow: 0 0 10px #686868;
        }

        @media (orientation: landscape) {
            .wrapper {

                height: 40vh;
            }

            .border {
                padding-top: 2vh;
            }


        }


    </style>

    <!--<div class="row" id='clientData'> -->


<div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text">Информация</h2>
  </div>
  <div class="mdl-card__supporting-text">

            <ul>
                <li><span class='SpLeft'>Имя</span>
                    <div class='FlRight'>{{$user->name}}</div>
                </li>
                <li><span class='SpLeft'>Телефон</span>
                    <div class='FlRight'>{{$user['phone']}}</div>
                </li>
                <li><span class='SpLeft'>e-mail</span>
                    <div class='FlRight'>{{$user['email']}}</div>
                </li>
                <li><span class='SpLeft'>Город</span>
                    <div class='FlRight'>{{$user['city']}}</div>
                </li>
                <li><span class='SpLeft'>Баланс</span>
                    <div class='FlRight'>{{$user->balance()}}</div>
                </li>
                <li><span class='SpLeft'>Объектов</span>
                    <div class='FlRight'>{{count($user['objects'])}}</div>
                </li>
            </ul>
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <a href ="/home" 
        class="mdl-button mdl-button--colored 
               mdl-js-button mdl-js-ripple-effect">
       Вернуться
    </a>
  </div>
</div>

<!--
    <div class="wrapper">
        <div class="border">
            <ul>
                <li><span class='SpLeft'>Имя</span>
                    <div class='FlRight'>{{$user->name}}</div>
                </li>
                <li><span class='SpLeft'>Телефон</span>
                    <div class='FlRight'>{{$user['phone']}}</div>
                </li>
                <li><span class='SpLeft'>e-mail</span>
                    <div class='FlRight'>{{$user['email']}}</div>
                </li>
                <li><span class='SpLeft'>Город</span>
                    <div class='FlRight'>{{$user['city']}}</div>
                </li>
                <li><span class='SpLeft'>Баланс</span>
                    <div class='FlRight'>{{$user->balance()}}</div>
                </li>
                <li><span class='SpLeft'>Объектов</span>
                    <div class='FlRight'>{{count($user['objects'])}}</div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-1 offset-4"></div>
        <a href="/home" id="home"><img class='bBack' src="/icons/back.png" alt=""></a>

    </div>
-->

@endsection
