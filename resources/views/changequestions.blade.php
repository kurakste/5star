
@extends('layouts.master')
@section('title', '5StarService')
@section('content')


    <button  
            class="backButton mdl-button mdl-js-button mdl-button--fab" id="">
     <a href="/objects"><i class="material-icons">keyboard_arrow_left</i></a> 
    </button>

    <div class="mdl-card mdl-shadow--2dp editObjectCard">
      <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">Изменить анкету.</h2>
      </div>
      <div class="mdl-card__supporting-text">

            <form action='/changequestions/store' method='POST' id="fMain">
                {{ csrf_field() }}
                <input type="hidden" name="object_id"  value="{{$questions[0]->object_id}}">
                <input type="hidden" id="count_of_question" name="count"  value="{{count($questions)}}">

            @for ($i=1; $i<count($questions)+1; $i++) 

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="fg-{{$i}}">
                    <label for="question_{{$i}}" id="label-{{$i}}">Вопрос {{$i}}</label>
                    <input type="text" name="question_{{$i}}" 
                           value="{{$questions[$i-1]->question}}"  
                           class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" 
                           placeholder="Введите ваш вопрос.">
                    
                    <div id="bRemoveQuestion-{{$i}}" data-question="{{$i}}"
                         class="icon material-icons btn_del">add</div>
                  </div>

            @endfor

            <a class="btn btn-outline-success btn-sm btn_cl btn-block" href="#" role="button" id="bAddQuestion">Добавить вопрос</a>
            <button type="submit" class="btn btn-outline-success btn-block">Сохранить</button>
            </form>
    </div>
</div>

@endsection

@section('script')
    <script src="{{asset('js/change_questions.js')}}"></script>
@endsection
