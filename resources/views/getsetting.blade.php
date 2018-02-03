
@extends('layouts.master')

@section('content')

    <style type="text/css">
        .wrapper  {
            font-size: 0.7rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            position: relative;
            margin: 5px;
            height: 75vh;
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

        .bPrev, .bNext, .bOk, .bCancel {
            background-color:#afa376;
            color:white;
        }
        .button-group {
            position: absolute;
            bottom:4vh;
            left:22%;
        }

        @media (orientation: landscape) {

            .right {
                width:50%;
                position: absolute;
                top: 5px;
                right: 0px;
            }

            .left {
                width:50%;
                position: absolute;
                top: 5px;
                left: 20px;
            }
            .wrapper {

                height: 74vh;
            }

            .border {
                padding-top: 2vh;
            }
        }

    </style>

    <!--<div class="row" id='clientData'> -->

    <div class="wrapper">
        <div class="border">

            {!! Form::open(['url'=>'/storesettings', 'id'=>'settingForm'])  !!}
            {{ csrf_field() }}

            <div id="card_1">
                <div class="left">
                    <div class="form-group">
                        {!! Form::label('name', 'пользователь') !!}
                        {!! Form::text('name',$user->name,['class'=>'form-control col-11', 'id'=>'fname']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('city','Город:') !!}
                        {!! Form::text('city',$user->city,['class'=>'form-control col-11', 'id'=>'fcity']) !!}
                    </div>
                </div>

                <div class="right">
                    <div class="form-group">
                        {!! Form::label('phone','телефон') !!}
                        {!! Form::text('phone',$user->phone,['class'=>'form-control col-11', 'id'=>'fphone']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email','email:') !!}
                        {!! Form::text('email',$user->email,['class'=>'form-control col-11', 'id'=>'fmail']) !!}
                    </div>
                </div>
                <div class = 'button-group '>
                    <a href='#' class="btn bPrev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                    <a href="/home" class="btn bCancel"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <a href="#" class="btn bOk" ><i class="fa fa-check" aria-hidden="true"></i></a>
                    <a href='#' class="btn bNext" ><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>

            </div> <!-- page-1 -->
            <div id="card_2" style="display: none;">
                <p>Отправлять на почту:</p>
                <div class="form-group">
                    {!! Form::label('leach_fb_checkbox','каждый отзыв:') !!}
                    {!! Form::checkbox('send_each_fb','send_each_fb',$user->settings['send_each_fb']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('lw_checkbox','ежедневный отчет:') !!}
                    {!! Form::checkbox('send_daily_report','send_daily_report',$user->settings['send_daily_report']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('wrcheckbox','еженедельный отчет:') !!}
                    {!! Form::checkbox('send_weekly_report','send_weekly_report', $user->settings['send_weekly_report']) !!}
                </div>
                <div class = 'button-group'>
                     <a href='#' class="btn bPrev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                     <a href="/home" class="btn bCancel" ><i class="fa fa-times" aria-hidden="true"></i></a>
                     <a href="#" class="btn bOk"><i class="fa fa-check" aria-hidden="true"></i></a>
                     <a href='#' class="btn bNext"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

    </div>
@stop
@section('script')
    <script src="/js/setting.js"></script>
@endsection
