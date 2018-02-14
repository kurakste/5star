@extends('layouts.master')
@section('title', '  HotLine')
@section('content')

    <button  
            class="backButton mdl-button mdl-js-button mdl-button--fab" >
     <a href="/objects"><i class="material-icons">keyboard_arrow_left</i></a> 
    </button>

            <button type="submit" form ="mainForm" 
            class="mdl-button mdl-js-button mdl-button--fab" id="editObjectButton">
            <a href="/object/add"><i class="material-icons">save</i></a> 
    </button>
    <div class="add-wrapper">
        
    <div class='buffer'></div>
    <div class="buffer"> </div>

    <div class="mdl-card mdl-shadow--2dp editObjectCard">
      <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">Карточка нового объекта</h2>
      </div>
      <div class="mdl-card__supporting-text">

                <form action='/object/store' method='POST' id="mainForm">
                    <input type="hidden" name="fuser_id"  value="{{$user_id}}">

                    {{ csrf_field() }}

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl_textfield__label" for="FNickname">Никнейм:</label>
                        <input type="text" name="fnickname" value=""  class="mdl-textfield__input" id="FNickname" aria-describedby="HNickname" placeholder="Введите никнейм вашего объекта." required pattern="^[A-Za-z0-9]+$">
                        <small id="HNickname" class="form-text text-muted text-justify">Никнеймы объекта будут помогать вам найти нужный объект среди ваших объектов. Он должен быть уникальным, если никнейм который вы вводите уже существует то мы предложим создать новый. Он должен состоять из цифр и букв латинского алфавита.</small>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl_textfield__label" for="fcity">Город:</label>
                        <input type="text" name="fcity" value=""class="mdl-textfield__input" id="fcity" aria-describedby="hcity" placeholder="Введите название города, где расположен объект." pattern="^[0-9a-zA-Zа-яА-Я\s.,:;!?-]+$">
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl_textfield__label" for="faddr">Адрес:</label>
                        <input type="text" name="faddr" value=""class="mdl-textfield__input" id="faddr" aria-describedby="haddr" placeholder="Введите название города, где расположен объект." pattern="^[0-9a-zA-Zа-яА-Я\s.,:!?-]+$">
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl_textfield__label" for="FManager">Менеджер:</label>
                        <input type="text" name="fmanager" value=""class="mdl-textfield__input" id="FManager" aria-describedby="HManager" placeholder="Введите имя менеджера." pattern="^[A-Za-z0-9а-яА-Я\s]+$" required>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl_textfield__label" for="fphone">Телефон:</label>
                        <input type="text" name="fphone" value="" class="mdl-textfield__input" id="FPhone" aria-describedby="HPhone" placeholder="Введите номер телефона менеджера." pattern="^[0-9]{10}$" required>
                        <small id="hphone" class="form-text text-muted text-justify">Введите номер телефона менеджера ответственного за объект. Тербуется ввести 10-ть цифр номра. Например: 9869347745</small>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label  class="mdl_textfield__label" for="fnotes">Примечания:</label>
                        <input type="text" class="mdl-textfield__input" name="fnotes" value="" id="FNotes" rows="3" aria-describedby="HNotes" placeholder="Любые примечания." pattern="^[0-9a-zA-Zа-яА-Я\s.,:;!?-+]+$">
                    </div>
                    <div>

                    </div>
                </form>
            </div> <!-- border -->
        </div> <!-- wrapper -->
    </div> <!-- add-wrapper -->
@endsection


