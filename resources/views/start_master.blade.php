@extends('layouts.master')
@section('title', 'HotLine')
@section('content')


    <style type="text/css">

        .container-fluid {
            min-height: 600px;
        }
        .wrapper  {

            font-size: 0.7rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            margin: 5px;
            text-transform: uppercase;
            color: #27282d;
            background-color: #fbfbfb;
            padding: 25px;
            outline: solid #aa9e72 1px;
            outline-offset: -15px;
        }


        .float-btn {
            margin:5px;
            width: 50px;
        }

        .addModule {
            position: fixed;
            top: 70px;
            right : 10px;
            z-index: 100;
        }



    </style>

    <div class="container-fluid">

        <div class="addModule">
            <button type ='submit' form = 'mainForm' class="btn btn-outline-success float-btn"><i class="fas fa-angle-left"></i></button>
        </div>
        <div class="wrapper">
            <h5 class="text-center">НАЧАЛО</h5>
            <p class="text-justify">
                На нашем сервисе мы можите получать отзывы на каждый отдельный объект вашего бизнеса.
                Например, если у вас сеть кафе, то вы сможете получать отзывы на каждое конкретное заведение. Это
                позволит вам точно знать из какого объекта пришел сигнал.
            </p>
            <p class="text-justify">
                Сейчас мы заполним карточку одного объекта, что бы он сразу появился у вас в кабинете и вы
                смогли начать работать. Сделующие объекты вы сможете добавлять из соответствующего пункта меню.
            </p>

             <button class="btn btn-outline-success">Поехали</button>
        </div>    <!--wrapper -->

        <div class="wrapper">
            <h5 class="text-center"> Название</h5>
            <p class="text-justify">
                Сейчас нужно придумать короткое и понятное для вас название объекта написанное латинскими буквами.
                По этому названию вы будете находить объект. Например кафе в торговом цунтре планета могло бы получить
                название cafe_v_planete.
            </p>
            <input type="text" class="form-control input-field" id="fnick">
            <button class="btn btn-outline-success">Дальше</button>
        </div>
        <div class="wrapper">
            <h5 class="text-center">Менеджер</h5>
            <p class="text-justify">
                Введите имя менеджера, который отвечает за объект.
            </p>
            <input type="text" class="form-control input-field" id="fname">
            <p class="text-justify">
                Введите номер телефона менеджера.
                Если вы не будете использовать эту информацию жмите кнопку "Дальше".
            </p>
            <input type="text" class="form-control input-field" id="phone">
            <button class="btn btn-outline-success">Дальше</button>
        </div>

        <div class="wrapper">
            <h5 class="text-center">Адрес</h5>
            <p class="text-justify">
                Введите город:
            </p>
            <input type="text" class="form-control input-field" id="fcity">
            <p class="text-justify">
                Введите адрес:
                Если вы не будете использовать эту информацию жмите кнопку "Дальше".
            </p>
            <input type="text" class="form-control input-field" id="faddress">

            <button class="btn btn-outline-success">Дальше</button>
        </div>



    </div> <!-- container-fluid -->
@endsection
