
@extends('layouts.master')
@section('title', 'HotLine')
@section('content')

     <a href="/object/add"><img class=bAdd src="icon/add-80.png" alt="" width='60'/></a> 

    <button id="bAddQuestion">
      <img class=bAdd src="icon/add-80.png" alt="" width='60'/>
    </button>
<div id="changeQuestionWrapper">
    
    <a class='bBack' href="/objects"><img src="/icon/left-80.png" alt="" width='60' /></a>

    <div class="buffer"> </div>
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

            <div  class='question-group' id='fg-{{$i}}' data-question="{{$i}}">
                <div class='questionBlock'>
                    <label for="question_{{$i}}" id="label-{{$i}}"
                           class="mdl_textfield__label"
                            >Вопрос #{{$i}}</label>
                    <input type="text" name="question_{{$i}}" 
                           value="{{$questions[$i-1]->question}}"  
                           class="mdl-textfield__input" 
                           placeholder="Введите ваш вопрос.">
                </div>
                    
                <div class="x-icon btn_del"  data-question="{{$i}}">
                   <img class='bbtn_del'  id="bRemoveQuestion-{{$i}}" src="/icon/del-30.png" alt="" width='20px'/>
                </div>
             </div>
            @endfor

    <button type="submit" id="ChangeQuestionButtonSave" >
      <img src="/icon/save-80.png" alt="" width='45'/>
    </button>
            </form>
    </div>
  </div>
</div>

@endsection

@section('script')
    <script src="{{asset('js/change_questions.js')}}"></script>
@endsection
