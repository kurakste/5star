@extends('layouts.fbmaster')
@section('title', '5StarService')
@section('content')
    <style>
        html {
            height: 100vh;
            width: 100vw;
        }
        body, .container, .card   {
            height: 100vh;
            width: 100vw;
        }

        .container {
            margin: 0;
            padding: 0;
        }
        #qForm {
            width:100%; /* vw */
            height:100%;
        }

        .btn-block {
            margin-top: 5%;
        }
        .card   {
            padding:0;
            width: 100vw; /* vw */
            height:100 vh; /* vh */
            display:none;
        }

        .card-header {
            padding-top: 5%;
        }

        .active {
            display:block;
        }
        .backward {
            position:absolute;
            bottom: 13%;
            left: 25px;
        }

        .forward {
            position:absolute;
            bottom: 13%;
            right: 25px;
        }

        #bSend {
            position:absolute;
            bottom: 7%;
            right: 25px;
        }

        .questions {
            margin-top:5%;
            margin-bottom: 5%;
        }

        #fnotes {
            width: 100%;
        }

        .answerSelector {
            width:100%;
        }

        #bSend {
            position: absolute;
            width: 150px;
            height: 51px;
            bottom: 7%;
            right: 25px;
        }

        @media (orientation: landscape) {

            .card-header {
                padding-top: 2%;
            }

            .backward {
                position:absolute;
                bottom: 7%;
                left: 25px;
            }

            .forward {
                position:absolute;
                bottom: 7%;
                right: 25px;
            }

            #bSend {
                position:absolute;
                width:150px;
                height: 51px;
                bottom: 7%;
                right: 25px;
            }

            .card-header {
                padding-top: 1%;
            }


            #fnotes {
                height:5%;
            }
            .questions {
                margin-top:5%;
                margin-bottom: 5%;
            }


            .card-block {
                overflow: hidden;
            }

            .fright {
                width:40%;
                float:right;
            }
            .fleft {
                width:40%;
                float:left;
            }

        }

    </style>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                <div class="fleft">
                    <div class="form-group">
                        <label id='lname' for="fname">Введите удобное для вас обращение:</label>
                        <input type="text" name="fname" value="" class="form-control validated required" id="fname"
                               aria-describedby="HManager" placeholder="Как к вам обратиться?"
                               data-my-pattern="[a-zA-Zа-яА-Я\s]+" data-must ='1' data-ok="1">
                    </div> <!--form-group -->
                </div> <!--fright -->
                <div class="fright">
                    <div class="form-group">
                        <label id='lphone' for="fphone">Введите ваш номер телефона:</label>
                        <input type="text" name="fphone" value="+7" class="form-control validated required"
                        data-my-pattern="\+?7\d+" data-max-lenght="12" data-must = '1' data-ok="1">
                        <p class="text-muted"> Например +79869347745 </p>
                    </div> <!-- form-group -->
                </div><!-- fleft -->
                <a href="#" class="btn btn-lg btn-outline-success backward" id = 'bBackward_{{$page}}'>Назад</a>
                <a href="#" class="btn btn-lg btn-outline-success forward" id = 'bForward_{{$page}}'>Вперед</a>
            </div> <!-- card-block -->
        </div> <!--card -->


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
                            <select class="custom-select answerSelector" name="fanswer_{{$loop->index}}">
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
                <p class="questions">Расскажите нам, что  мы можем сделать лучше для вас в нашем заведении.</p>

                <div class="form-group">
                    <textarea cols ='' rows='' class='validated' name="fnotes" id="fnotes" data-my-pattern="[a-zA-Zа-яА-Я\s.,:;!?№]*" data-ok="1"></textarea>
                </div>
                <a href="#" class="btn btn-lg btn-outline-success backward" id = 'bBackward_{{$page}}'>Назад</a>



                <button type="submit" class="btn btn-lg btn-outline-success" id = 'bSend'>Отправить</button>
                </form>
            </div>
        </div>

@endsection

@section('script')
    <script src="/js/fb.js"></script>
@endsection

