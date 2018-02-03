@extends('layouts.master')

<style type="text/css">

    .wrapper  {
        font-size: 0.6rem;
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        position: relative;
        margin: 2px;
        margin-bottom: 20px;
        height: 45vh;
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
        padding: 25px;
    }

    #objectsData {
        padding-bottom:5%;
        margin-bottom:6%;
    }

    #clientData ul, #objectsData ul{
        list-style-type:none;
        width:98%;
    }

    ul {
        padding-left:3%;
        padding-left:1%;
        list-style-type:none;
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

    .addModule {
        position: absolute;
        top: 20px;
        right : 10px;
        z-index: 100;
    }

    .btn_cl, .btn_obj {margin:2px;}
</style>

@section('title', 'HotLine')
@section('content')
<div class="container-fluid">
    <div class="addModule">
        <a href="object/add" class="btn btn-outline-success"><i class="fas fa-plus-circle"></i></a>

    </div>

    @foreach ($user->objects as $object)
    <div class="wrapper">
        <div class="border">

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
                        <li><span class='SpLeft'>Ср. оценка</span>
                            <div class='FlRight'>{{$object->avrgOffAllAnswer()}}</div>
                        </li>
                    </ul>

                    {!! Form::open(['url'=>'object/edit','method'=>'POST'])  !!}
                    <input type="hidden" name="fclient_id" value="{{$user->id}}" >
                    <input type="hidden" name="id" value="{{$object->id}}" >
                    <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj"><i class="fas fa-edit"></i></button>
                    {!! Form::close() !!}
                    {!! Form::open(['url'=>'object/delete','method'=>'POST'])  !!}
                    <input type="hidden" name="fclient_id" value="{{$user->id}}" >
                    <input type="hidden" name="id" value="{{$object->id}}" >
                    <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj"><i class="fas fa-trash-alt"></i></button>
                    {!! Form::close() !!}
                    {!! Form::open(['url'=>'showfb','method'=>'POST'])  !!}
                    <input type="hidden" name="fclient_id" value="{{$user->id}}" >
                    <input type="hidden" name="id" value="{{$object->id}}" >
                    <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj"><i class="fas fa-search"></i></button>
                    {!! Form::close() !!}
                    {!! Form::open(['url'=>'changequestions','method'=>'POST'])  !!}
                    <input type="hidden" name="id" value="{{$object->id}}" >
                    <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj"><i class="fas fa-list-ul"></i></button>
                    {!! Form::close() !!}
                    {!! Form::open(['url'=>'downloadQR','method'=>'POST'])  !!}
                    <input type="hidden" name="id" value="{{$object->id}}" >
                    <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj"><i class="fas fa-qrcode"></i></button>
                    {!! Form::close() !!}
                    {!! Form::open(['url'=>'_posters','method'=>'POST'])  !!}
                    <input type="hidden" name="id" value="{{$object->id}}" >
                    <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj"><i class="far fa-images"></i></button>
                    {!! Form::close() !!}

                    {!! Form::open(['url'=>'/banner','method'=>'POST'])  !!}
                    <input type="hidden" name="id" value="{{$object->id}}" >
                    <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj"><i class="far fa-newspaper"></i></button>
                    {!! Form::close() !!}
                </div> <!-- row -->
        </div> <!-- border -->
    </div> <!-- wrapper -->
@endforeach
</div> <!-- container fluid -->
@endsection
