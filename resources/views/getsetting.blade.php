<style type="text/css">
    .wrapper  {
        font-size: 0.7rem;
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        position: relative;
        margin: 5px;
        height: 80vh;
        text-transform: uppercase;
        color: #27282d;
        background-color: #fbfbfb;
    }

    .border {
        padding-top: 2vh;
        padding-left: 1vh;
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




     input.form-control {
        max-width: 90%;
    }
    .left {
        width:50%;
        float:left;

    }

    .right {
        width:50%;
        float: left;
    }

    @media (orientation: landscape) {
        .wrapper {

        height: 30vh;
    }

        .border {
        padding-top: 2vh;
    }
    }

</style>
@extends('layouts.master')

@section('content')

    <!--<div class="row" id='clientData'> -->

    <div class="wrapper">
        <div class="border">

            <h2>настройки</h2>
            <hr/>

            {!! Form::open(['url'=>'/storesettings'])  !!}
            {{ csrf_field() }}
            <div class="left">
                <div class="form-group">
                    {!! Form::label('name', 'пользователь') !!}
                    {!! Form::text('name',$user->name,['class'=>'form-control col-8']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('city','Город:') !!}
                    {!! Form::text('city',$user->city,['class'=>'form-control col-8', 'id'=>'fcity']) !!}
                </div>

            </div>
            <div class="right">
                <div class="form-group">
                    {!! Form::label('phone','телефон') !!}
                    {!! Form::text('phone',$user->phone,['class'=>'form-control col-8']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email','email:') !!}
                    {!! Form::text('email',$user->email,['class'=>'form-control col-8']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('leach_fb_checkbox','Отправлять каждый отзыв на почту:') !!}
                {!! Form::checkbox('send_each_fb','send_each_fb',$user->settings['send_each_fb']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('lw_checkbox','Отправлять ежедневный отчет на почту:') !!}
                {!! Form::checkbox('send_daily_report','send_daily_report',$user->settings['send_daily_report']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('wrcheckbox','Отправлять еженедельный отчет на почту:') !!}
                {!! Form::checkbox('send_weekly_report','send_weekly_report', $user->settings['send_weekly_report']) !!}
            </div>

            <div class="form-group">
            {!! Form::submit('Сохранить',['class'=>'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-1 offset-4"></div>
        <a href="/home" id="home"><img class='bBack' src="/icons/back.png" alt=""></a>

    </div>
@stop
