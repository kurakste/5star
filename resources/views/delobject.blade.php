@extends('layouts.master')
@section('title', 'HotLine')
@section('content')
<style type="text/css">
    .container-fluid {
    height: 800px;
    }
    .wrapper  {
    font-size: 0.7rem;
    font-family: 'Montserrat', sans-serif;
    font-weight: bold;
    position: relative;
    margin: 5px;
    height: 750px;
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
    height: 730px;
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
    .header {
        margin-top: 20px;
    }
</style>

<div class="container-fluid">
    <!--<div class="row" id='clientData'> -->
    <div class="addModule">
        <div><a href="/objects" class="btn btn-outline-success float-btn"><i class="fas fa-angle-left"></i></a></div>
    </div>


    <div class="wrapper">
        <div class="border">
            <form action="/object/finishdel" method="post">
                {{ csrf_field() }}
                <h5 class="header text-center">Внимание!</h5>
                <p class="text-justify">Вы удаляете объект. Все данные связанные с объектом будут утрачены.  Велючая все отзывы зоторые были оставленны
                    для этого объекта. Пролжаем?</p>
                <input type="hidden" name="id"  value="{{$object->id}}">
                <input type="hidden" name="fclient_id"  value="{{$object->user_id}}">


                <button type="submit" class="btn btn-outline-success btn-block">Удалить</button>
            </form>

        </div>
    </div>

</div> <!--container-fluid -->

@endsection
