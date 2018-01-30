@extends('layouts.master')
@section('title', '5StarService')
@section('content')


    <style type="text/css">

        #clientData {
            padding-bottom:5%;
            border-bottom:solid gray 3px;
            margin-bottom:6%;
                              }
        #objectsData {
            padding-bottom:5%;
            border-bottom:solid gray 3px;
            margin-bottom:6%;
        }

        #clientData ul, #objectsData ul{
            list-style-type:none;
            width:98%;
        }

        ul {
            padding-left:3%;
            padding-left:1%;
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

        .btn_cl {
            width:20%;
        }

        #clientData ul li:last-child, #objectsData ul li:last-child {
            border-bottom: solid 0px gray;

        }
        .FlRight {
            float:right;
        }

        .btn_cl, .btn_obj {margin:2px;}
    </style>

    <!--<div class="row" id='clientData'> -->
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

    <a class="btn btn-primary btn-sm btn_cl" href="/object/add" role="button">Добавить объект</a>
    <a class="btn btn-primary btn-sm btn_cl" href="/bill/charge" role="button"> Пополнить</a>
    <a class="btn btn-primary btn-sm btn_cl" href="/bill/details" role="button">Детали счета</a>
    <a class="btn btn-primary btn-sm btn_cl" href="/showtariffs" role="button">Тарифы</a>
    <a class="btn btn-primary btn-sm btn_cl" href="/getsettings" role="button">Настройки</a>

    <!-- </div> -->
    @foreach ($user->objects as $object)
    <div class="row" id='objectsData'>

            <ul>
                <li><span class='SpLeft'>Никнейм</span>
                    <div class='FlRight'>{{$object->nick}}</div>
                </li>
                <li><span class='SpLeft'>Менеджер</span>
                    <div class='FlRight'>{{$object->managername}}</div>
                </li>
                <li><span class='SpLeft'>Телефон</span>
                    <div class='FlRight'>{{$object->managerphone}}</div>
                </li>
                <li><span class='SpLeft'>Город</span>
                    <div class='FlRight'>{{$object->city}}</div>
                </li>
                <li><span class='SpLeft'>Адрес</span>
                    <div class='FlRight'>{{$object->addr}}</div>
                </li>
                <li><span class='SpLeft'>Примечания</span>
                    <div class='FlRight'>{{$object->notes}}</div>
                </li>
                <li><span class='SpLeft'>Кол-во отзывов</span>
                <div class='FlRight'>{{$object->countOffeedbacks()}}</div>
                </li>
                <li><span class='SpLeft'>Средний бал по отзывам</span>
                <div class='FlRight'>{{$object->avrgOffAllAnswer()}}</div>
                </li>
            </ul>

 {!! Form::open(['url'=>'object/edit','method'=>'POST'])  !!}
    <input type="hidden" name="fclient_id" value="{{$user->id}}" >
    <input type="hidden" name="id" value="{{$object->id}}" >
    <button type="subbmit" class="btn btn-primary btn-sm btn_obj">Редактировать</button>
 {!! Form::close() !!}
 {!! Form::open(['url'=>'object/delete','method'=>'POST'])  !!}
    <input type="hidden" name="fclient_id" value="{{$user->id}}" >
    <input type="hidden" name="id" value="{{$object->id}}" >
    <button type="subbmit" class="btn btn-primary btn-sm btn_obj">Удалить объект</button>
 {!! Form::close() !!}
 {!! Form::open(['url'=>'showfb','method'=>'POST'])  !!}
    <input type="hidden" name="fclient_id" value="{{$user->id}}" >
    <input type="hidden" name="id" value="{{$object->id}}" >
    <button type="subbmit" class="btn btn-primary btn-sm btn_obj">Смотреть отзывы</button>
 {!! Form::close() !!}
 {!! Form::open(['url'=>'changequestions','method'=>'POST'])  !!}
    <input type="hidden" name="id" value="{{$object->id}}" >
    <button type="subbmit" class="btn btn-primary btn-sm btn_obj">Изменить анкету</button>
 {!! Form::close() !!}
 {!! Form::open(['url'=>'downloadQR','method'=>'POST'])  !!}
    <input type="hidden" name="id" value="{{$object->id}}" >
    <button type="subbmit" class="btn btn-primary btn-sm btn_obj">QRCode</button>
 {!! Form::close() !!}
 {!! Form::open(['url'=>'_posters','method'=>'POST'])  !!}
    <input type="hidden" name="id" value="{{$object->id}}" >
    <button type="subbmit" class="btn btn-primary btn-sm btn_obj">Постеры</button>
 {!! Form::close() !!}

{!! Form::open(['url'=>'/banner','method'=>'POST'])  !!}
    <input type="hidden" name="id" value="{{$object->id}}" >
    <button type="subbmit" class="btn btn-primary btn-sm btn_obj">Банер</button>
{!! Form::close() !!}
</div>
    @endforeach
@endsection
