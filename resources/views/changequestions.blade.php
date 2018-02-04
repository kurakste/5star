
@extends('layouts.master')
@section('title', '5StarService')
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

        .container-fluid > div:last-child {
            margin-bottom: 50px;
        }
        .form-group {
            position: relative;
        }

        .btn_del {
            position: absolute;
            top:27px;
            right:0px;
            height:35px;
            background-color: white;
        }

    </style>

    <div class="container-fluid">
        <div class="addModule">
            <div><a href="/objects" class="btn btn-outline-success float-btn"><i class="fas fa-angle-left"></i></a></div>
        </div>

        <div class="wrapper">

            <form action='/changequestions/store' method='POST' id="fMain">
                {{ csrf_field() }}
                <input type="hidden" name="object_id"  value="{{$questions[0]->object_id}}">
                <input type="hidden" id="count_of_question" name="count"  value="{{count($questions)}}">

            @for ($i=1; $i<count($questions)+1; $i++)
                <div class="form-group" id="fg-{{$i}}">
                    <label for="question_{{$i}}" id="label-{{$i}}">Вопрос {{$i}}</label>
                    <input type="text" name="question_{{$i}}" value="{{$questions[$i-1]->question}}"  class="form-control" placeholder="Введите ваш вопрос.">
                    <a class="btn btn-outline-success btn-sm btn_del" id="bRemoveQuestion-{{$i}}" data-question="{{$i}}" href="#" role="button">X</a>
                </div>
            @endfor

            <a class="btn btn-outline-success btn-sm btn_cl btn-block" href="#" role="button" id="bAddQuestion">Добавить вопрос</a>
            <button type="submit" class="btn btn-outline-success btn-block">Сохранить</button>

            </form>
        </div> <!--WRAPPER -->
    </div> <!--  container-fluid -->
@endsection

@section('script')
    <script src="{{asset('js/change_questions.js')}}"></script>
@endsection
