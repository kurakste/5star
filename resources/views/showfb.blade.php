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
            margin-bottom: 20px;
            margin-top: 10px;
            text-transform: uppercase;
            color: #27282d;
            background-color: #fbfbfb;
            outline: solid #aa9e72 1px;
            outline-offset: -10px;

            padding: 15px;
        }

        .addModule {
            position: fixed;
            top: 70px;
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
        .comment {
            margin-bottom: 20px;
        }
        .container-fluid > div:last-child {
            margin-bottom: 50px;
        }

    </style>

<div class="container-fluid">
    <div class="addModule">
        <div><a href="/objects" class="btn btn-outline-success float-btn"><i class="fas fa-angle-left"></i></a></div>
    </div>


    @foreach ($fbarray as $fb)
    <div class="wrapper">

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
            @endforeach
</div> <!-- container fluid -->
 @endsection


