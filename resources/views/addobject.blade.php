@extends('layouts.master')

@section('content')
    <style type="text/css">

        .wrapper  {
            max-width: 736px;
            font-size: 0.6rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            position: relative;
            margin: 2px;
            margin-bottom: 80px;
            height: 800px;
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

        @media (orientation: landscape) {
            .wrapper  {


            }

        }

    </style>
    <div class="container-fluid">

        <div class="addModule">
            <div><a href="/home" class="btn btn-outline-success float-btn"><i class="fas fa-angle-left"></i></a></div>
            <div><a href="/object/add" class="btn btn-outline-success float-btn"><i class="fas fa-plus-circle"></i></a></div>
            <button type="submit" form ="mainForm" class="btn btn-outline-success float-btn"><i class="far fa-save"></i></button>


        </div>

        <div class="wrapper">
            <div class="border">

                <form action='/object/store' method='POST' id="mainForm">
                    <input type="hidden" name="fuser_id"  value="{{$user_id}}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="FNickname">Никнейм:</label>
                        <input type="text" name="fnickname" value=""  class="form-control" id="FNickname" aria-describedby="HNickname" placeholder="Введите никнейм вашего объекта." required pattern="^[A-Za-z0-9]+$">
                        <small id="HNickname" class="form-text text-muted text-justify">Никнеймы объекта будут помогать вам найти нужный объект среди ваших объектов. Он должен быть уникальным, если никнейм который вы вводите уже существует то мы предложим создать новый. Он должен состоять из цифр и букв латинского алфавита.</small>
                    </div>
                    <div class="form-group">
                        <label for="fcity">Город:</label>
                        <input type="text" name="fcity" value=""class="form-control" id="fcity" aria-describedby="hcity" placeholder="Введите название города, где расположен объект." pattern="^[0-9a-zA-Zа-яА-Я\s.,:;!?-]+$">
                        <small id="hcity" class="form-text text-muted">Введите название города, где расположен объект.</small>
                    </div>
                    <div class="form-group">
                        <label for="faddr">Адрес:</label>
                        <input type="text" name="faddr" value=""class="form-control" id="faddr" aria-describedby="haddr" placeholder="Введите название города, где расположен объект." pattern="^[0-9a-zA-Zа-яА-Я\s.,:!?-]+$">
                        <small id="haddr" class="form-text text-muted">Введите адрес объекта.</small>
                    </div>
                    <div class="form-group">
                        <label for="FManager">Менеджер:</label>
                        <input type="text" name="fmanager" value=""class="form-control" id="FManager" aria-describedby="HManager" placeholder="Введите имя менеджера." pattern="^[A-Za-z0-9а-яА-Я\s]+$" required>
                        <small id="HManager" class="form-text text-muted">Введите имя менеджера ответственного за объект:</small>
                    </div>
                    <div class="form-group">
                        <label for="fphone">Телефон:</label>
                        <input type="text" name="fphone" value="" class="form-control" id="FPhone" aria-describedby="HPhone" placeholder="Введите номер телефона менеджера." pattern="^[0-9]{10}$" required>
                        <small id="hphone" class="form-text text-muted">Введите номер телефона менеджера ответственного за объект. Тербуется ввести 10-ть цифр номра. Например: 9869347745</small>
                    </div>
                    <div class="form-group">
                        <label for="fnotes">Примечания:</label>
                        <input type="text" class="form-control" name="fnotes" value="" id="FNotes" rows="3" aria-describedby="HNotes" placeholder="Любые примечания." pattern="^[0-9a-zA-Zа-яА-Я\s.,:;!?-+]+$">
                        <small id="hnotes" class="form-text text-muted">Здесь можно ввести любые примечания для вашего объекта.</small>
                    </div>
                    <div>

                    </div>
                </form>
            </div> <!-- border -->
        </div> <!-- wrapper -->
    </div> <!-- container-fluid -->
@endsection


