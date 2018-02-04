@extends('layouts.master')
@section('title', 'HotLine')
@section('content')

    <style type="text/css">
        .container-fluid {
            min-height: 600px;
        }
        .wrapper  {
            font-size: 0.7rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            position: relative;
            margin: 5px;
            height: 220px;
            text-transform: uppercase;
            color: #27282d;
            background-color: #fbfbfb;
        }
        .border {
            padding-top: 2vh;
            padding-left: 2vh;
            padding-right: 2vh;
            position: absolute;
            top:1.7vh;
            left: 2vw;
            border: solid #aa9e72 1px;
            height: 200px;
            width:95%;
        }
        .addModule {
            position: absolute;
            top: 20px;
            right : 10px;
            z-index: 100;
        }
        .float-btn {
            margin:5px;
            width: 50px;
        }
        .left {
            width:40%;
            float:left;
        }
        .right {
            width:40%;
            float:right;
        }

        .clearBlock {
            clear:both;
        }
    </style>

<div class="container-fluid">
    <div class="addModule">
        <div><a href="/objects" class="btn btn-outline-success float-btn"><i class="fas fa-angle-left"></i></a></div>
        <button type="submit" form ="mainForm" class="btn btn-outline-success float-btn"><i class="far fa-save"></i></button>
    </div>

    @foreach ($fbarray as $fb)
    <div class="wrapper">
        <div class="border">
                <div class='left'>
                    <div class = 'rw'>дата</div>
                    <div class = 'rw'>Имя</div>
                    <div class = 'rw'>Телефон</div>
                    <div class = 'rw'>Ср. бал</div>
                    <div class = 'rw'>Ответы</div>
                    <div class = 'rw'>Комментарий:</div>
                </div>
                <div class='right'>
                    <div>{{Carbon\Carbon::parse($fb['created_at'])->format('d-m-y')}}</div>
                    <div>{{$fb['name']}}</div>
                    <div>{{$fb['phone']}}</div>
                    <div>{{$fb->avrgAnswer()}}</div>
                    <div><a href="/showanswer?fb_id={{$fb['id']}}&obj_id={{$object->id}}">анкета</a></div>
                </div>
                <div class="clearBlock"></div>
                <div class="comment"><p>{{$fb['comment']}}</p></div>
        </div>
    </div>
            @endforeach
</div> <!-- container fluid -->
 @endsection


