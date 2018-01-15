@extends('layouts.master')
@section('title', '5StarService')
@section('content')


    <style type="text/css">
    </style>
<form action="/object/finishdel" method="post">
<h1> Вы удаляете объект. Все данные связанные с объектом будут утрачены.</h1>
 {{ csrf_field() }}

  <input type="hidden" name="id"  value="{{$object->id}}">
  <input type="hidden" name="fclient_id"  value="{{$object->user_id}}">

  <div class="form-group">
    <label for="FNickname">Никнейм:</label> 
    <input type="text" name="fnickname" value="{{$object->nick}}"  class="form-control" id="FNickname" aria-describedby="HNickname" placeholder="Введите никнейм вашего объекта." required pattern="^[A-Za-z0-9]+$">
    <small id="HNickname" class="form-text text-muted">Никнеймы объекта будут помогать вам найти нужный объект среди ваших объектов. Он должен быть уникальным, если никнейм который вы вводите уже существует то мы предложим создать новый. Он должен состоять из цифр и букв латинского алфавита.</small>
  </div>
  <div class="form-group">
    <label for="FNotes">Город:</label> 
    <input type="text" class="form-control" name="fcity" value="{{$object->city}}" id="FCity" aria-describedby="HNotes" placeholder="Введите город." pattern="^[0-9a-zA-Zа-яА-Я\s.,:!?-]+$">
    <small id="HNotes" class="form-text text-muted">Введите город.</small>
  </div>
  <div class="form-group">
    <label for="FAddr">Адрес:</label> 
    <input type="text" class="form-control" name="faddr" value="{{$object->addr}}" id="FAddr" aria-describedby="HAddr" placeholder="Введите адрес объекта." pattern="^[0-9a-zA-Zа-яА-Я\s.,:;!?-]+$">
    <small id="HNotes" class="form-text text-muted">Введите  адрес.</small>
  </div>
  <div class="form-group">
    <label for="FManager">Менеджер:</label> 
    <input type="text" name="fmanager" value="{{$object->managername}}"class="form-control" id="FManager" aria-describedby="HManager" placeholder="Введите имя менеджера." pattern="^[A-Za-z0-9а-яА-Я\s]+$">
    <small id="HManager" class="form-text text-muted">Введите имя менеджера ответственного за объект:</small>
  </div>
  <div class="form-group">
    <label for="FPhone">Телефон:</label> 
    <input type="text" name="fphone" value="{{$object->managerphone}}" class="form-control" id="FPhone" aria-describedby="HPhone" placeholder="Введите номер телефона менеджера." pattern="^[0-9]{10}$">
    <small id="HPhone" class="form-text text-muted">Введите номер телефона менеджера ответственного за объект. Тербуется ввести 10-ть цифр номра. Например: 9869347745</small>
  </div>
  <div class="form-group">
    <label for="FNotes">Примечания:</label> 
    <input type="text" class="form-control" name="fnotes" value="{{$object->notes}}" id="FNotes" aria-describedby="HNotes" placeholder="Любые примечания." pattern="^[a-zA-Zа-яА-Я\s.,:;!?-+]+$">

    <small id="HNotes" class="form-text text-muted">Здесь можно ввести любые примечания для вашего объекта.</small>
  </div>

 <button type="submit" class="btn btn-primary btn-block">Удалить</button>
</form>

@endsection
