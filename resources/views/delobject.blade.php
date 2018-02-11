@extends('layouts.master')
@section('title', 'HotLine')
@section('content')


    <button  
            class="backButton mdl-button mdl-js-button mdl-button--fab" id="">
     <a href="/objects"><i class="material-icons">keyboard_arrow_left</i></a> 

    </button>

    <div class="mdl-card mdl-shadow--2dp editObjectCard">
      <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">Удаляем объект {{$object->nick}}</h2>
      </div>
      <div class="mdl-card__supporting-text">
            <form action="/object/finishdel" method="post">
                {{ csrf_field() }}
                <h5 class="header text-center">Внимание!</h5>
                <p class="text-justify">Вы удаляете объект. Все данные связанные с объектом будут утрачены.  Включая все отзывы которые были оставленны
                    для этого объекта. Пролжаем?</p>
                <input type="hidden" name="id"  value="{{$object->id}}">
                <input type="hidden" name="fclient_id"  value="{{$object->user_id}}">


                <button type="submit" id='subbmitDell'
                        class="mdl-button mdl-js-button mdl-button--raised
                         mdl-js-ripple-effect mdl-button--accent">Удалить</button>
            </form>

  </div>
</div>
@endsection
