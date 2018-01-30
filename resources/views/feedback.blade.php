@extends('layouts.fbmaster')
@section('title', '5StarService')
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <style>
        .body {
            width:100%;
            height:100%;
        }
        .container {
            margin: 0;
            padding: 0;
        }
        #qForm {
            width:100vw; /* vw */
            height:90vh;
        }

        .btn-block {
            margin-top: 20px;
        }
        .card   {
            padding:0;
            width:100%; /* vw */
            height:100%; /* vh */
            display:none;
        }

        .card-header {
            padding-top: 30px;
        }

        .active {
            display:block;
        }
        .backward {
            position:absolute;
            bottom: 35px;
            left: 30px;
        }

        .forward {
            position:absolute;
            bottom: 35px;
            right: 30px;
        }

        .questions {
            margin-top:50px;
            margin-bottom: 50px;
        }

        #fnotes {
            width:90%
        }

    </style>
    <?php $page=1; ?>
    <form action="/fb/store" method="post" id="qForm">
     {{ csrf_field() }}

        <input type="hidden" name="id"  value="{{$object_id}}"> <!--передаем id ОБЪЕКТА для которого составлен отзыв. -->
        <input type="hidden" id ="countOfQuestions" name="countOfQuestions" value="{{count($questions)}}"> <!--передаем кол-во вопросов в анкете. -->

        <div class="card active" id="card_{{$page}}">
            <div class="card-header text-center">
                ИЗМЕНИМ МИР К ЛУЧШЕМУ
            </div>
            <div class="card-block">
                <h4 class="card-title text-center">Отзыв для сервиса "Горячая линия".</h4>
                <p class="card-text text-justify">Здравствуйте. Мы рады что вы хотите высказать нам
                    Ваше мение о нашей работе. Мы обязательно используем его для того, что бы
                    быть лучшим сервисом для вас.
                </p>
                <p class="text-justify">
                    Мы спросим у вас номер телефона. Возможно нам понадобится что-то уточнить. Заполните
                    пожалуйсата это поле. Спасибо.
                </p>
                <a href="#" class="btn btn-lg btn-outline-success disabled backward" id = 'bBackward_{{$page}}'>Назад</a>
                <a href="#" class="btn btn-lg btn-outline-success forward" id = 'bForward_{{$page}}'>Вперед</a>
            </div>
        </div>
        <?php $page++; ?>
        <div class="card" id="card_{{$page}}">
            <div class="card-header text-center">
                ИЗМЕНИМ МИР К ЛУЧШЕМУ
            </div>
            <div class="card-block">
                <h4 class="card-title  text-center">Отзыв для сервиса "Горячая линия"</h4>
                <div class="form-group">
                    <label for="fphone">Телефон:</label>
                    <input type="text" name="fphone" value="+7" class="form-control validated required"
                           data-my-pattern="\+?7\d+" data-max-lenght="12" data-must = '1' data-ok="1"
                           id="fphone" aria-describedby="HPhone">
                    <small id="hphone" class="form-text text-muted"
                    >Введите ваш номер телефона 11 цифр номера. Например: +79869347745.</small>
                </div>
                <div class="form-group">
                    <label for="fname">Введите удобное для вас обращение:</label>
                    <input type="text" name="fname" value="" class="form-control validated required" id="fname"
                           aria-describedby="HManager" placeholder="Как к вам удобно обратиться?"
                           data-my-pattern="[a-zA-Zа-яА-Я\s]+" data-must ='1' data-ok="1">
                </div>

                <a href="#" class="btn btn-lg btn-outline-success backward" id = 'bBackward_{{$page}}'>Назад</a>
                <a href="#" class="btn btn-lg btn-outline-success forward" id = 'bForward_{{$page}}'>Вперед</a>
            </div>
        </div>


    @foreach ($questions as $question)
            <?php $page++; ?>
            <div class="card" id="card_{{$page}}">
                <div class="card-header text-center">
                    ИЗМЕНИМ МИР К ЛУЧШЕМУ
                </div>
                <div class="card-block">
                    <h4 class="card-title text-center">Отзыв для сервиса "Горячая линия"</h4>
                    <p class="questions">{{$question->question}}</p>  <!-- Выводим вопрос. -->
                    <input type="hidden" name="question_id_{{$loop->index}}"  value="{{$question->id}}"> <!--передаем id Вопроса.
                     он нужен для сохранения ответов. -->
                        <div class="form-group">
                            <select class="custom-select" name="fanswer_{{$loop->index}}">
                                <option value="0" selected>Дайте нам оценку!</option>
                                <option value="1">Отвратительно</option>
                                <option value="2">Плохо</option>
                                <option value="3">Пойдет</option>
                                <option value="4">Хорошо</option>
                                <option value="5">Отлично</option>
                            </select>
                        </div>

                    <a href="#" class="btn btn-lg btn-outline-success backward" id = 'bBackward_{{$page}}'>Назад</a>
                    <a href="#" class="btn btn-lg btn-outline-success forward" id = 'bForward_{{$page}}'>Вперед</a>
                </div>
            </div>
        @endforeach
        <?php $page++; ?>
        <div class="card" id="card_{{$page}}">
            <div class="card-header text-center">
                ИЗМЕНИМ МИР К ЛУЧШЕМУ
            </div>
            <div class="card-block">
                <h4 class="card-title  text-center">Отзыв для сервиса "Горячая линия"</h4>
                <p class="questions">Расскажите нам, что бы вы сделать лучше для вас в нашем заведении. Спасибо!</p>

                <div class="form-group">
                    <textarea class='validated' name="fnotes" id="fnotes" data-my-pattern="[a-zA-Zа-яА-Я\s.,:;!?№]*" data-ok="1"></textarea>
                </div>
                <a href="#" class="btn btn-lg btn-outline-success backward" id = 'bBackward_{{$page}}'>Назад</a>
                <a href="#" class="btn btn-lg btn-outline-success forward disabled" id = 'bForward_{{$page}}'>Вперед</a>


                <button type="submit" class="btn btn-outline-success btn-block" id = 'bSend'>Отправить отзыв.</button>
                </form>
            </div>
        </div>

@endsection

@section('script')
    <script src="/js/fb.js"></script>
@endsection

