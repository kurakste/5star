@extends('layouts.master')
@section('title', '  HotLine')
@section('content')


    <a class='bBack' href="/objects"><img src="/icon/left-80.png" alt="" width='60' /></a>

    <button type="submit" form ="mainForm" class="buttonSave">
      <a href="/object/add"><img src="/icon/save-80.png" alt="" width='45'/></a> 
    </button>

    <div class="buffer"> </div>
    <div class="mdl-card mdl-shadow--2dp editObjectCard">
      <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">{{$object->nick}}</h2>
      </div>
      <div class="mdl-card__supporting-text">

            <form action="/object/store" id="mainForm" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="id"  value="{{$object->id}}">
                <input type="hidden" name="fuser_id"  value="{{$object->user_id}}">

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="FNickname">Никнейм:</label>
                    <input type="text" name="fnickname" value="{{$object->nick}}"  
                    class="mdl-textfield__input" id="FNickname" aria-describedby="HNickname" 
                    placeholder="Введите никнейм вашего объекта." 
                    required pattern="^[A-Za-z0-9]+$">
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="FNotes">Город:</label>
                    <input type="text" class="mdl-textfield__input form-control" name="fcity" value="{{$object->city}}" id="FCity" aria-describedby="HNotes" placeholder="Введите город." pattern="^[0-9a-zA-Zа-яА-Я\s.,:!?-]+$">
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="FAddr">Адрес:</label>
                    <input type="text" class="mdl-textfield__input form-control" name="faddr" value="{{$object->addr}}" id="FAddr" aria-describedby="HAddr" placeholder="Введите адрес объекта." pattern="^[0-9a-zA-Zа-яА-Я\s.,:;!?-]+$">
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="FManager">Менеджер:</label>
                    <input type="text" name="fmanager" value="{{$object->managername}}"class="mdl-textfield__input form-control" id="FManager" aria-describedby="HManager" placeholder="Введите имя менеджера." pattern="^[A-Za-z0-9а-яА-Я\s]+$">
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="fphone">Телефон:</label>
                    <input type="text" name="fphone" value="{{$object->managerphone}}" class="mdl-textfield__input form-control" id="FPhone" aria-describedby="HPhone" placeholder="Введите номер телефона менеджера." pattern="^[0-9]{10}$">
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="FNotes">Примечания:</label>
                    <input type="text" class="mdl-textfield__input form-control" name="fnotes" value="{{$object->notes}}" id="FNotes" aria-describedby="HNotes" placeholder="Любые примечания." pattern="^[a-zA-Zа-яА-Я\s.,:;!?-+]+$">
                </div>
            </form>
    </div>
    </div>



@endsection
