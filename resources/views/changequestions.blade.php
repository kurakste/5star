
@extends('layouts.master')
@section('title', '5StarService')
@section('content')


    <style type="text/css">
    </style>
    
<form action='/changequestions/store' method='POST' id="fMain">
  <input type="hidden" name="object_id"  value="{{$questions[0]->object_id}}">
  <input type="hidden" id="count_of_question" name="count"  value="{{count($questions)}}">
 
  {{ csrf_field() }}


  @for ($i=1; $i<count($questions)+1; $i++)
        <div class="form-group" id="fg-{{$i}}">
            <label for="question_{{$i}}" id="label-{{$i}}">Вопрос {{$i}}</label>
            <input type="text" name="question_{{$i}}" value="{{$questions[$i-1]->question}}"  class="form-control" placeholder="Введите ваш вопрос.">
            <a class="btn btn-primary btn-sm btn_del" id="bRemoveQuestion-{{$i}}" data-question="{{$i}}" href="#" role="button">X</a>
        </div>
  @endfor

    <a class="btn btn-primary btn-sm btn_cl btn-block" href="#" role="button" id="bAddQuestion">Добавить вопрос</a>
    <button type="submit" class="btn btn-primary btn-block">Сохранить</button>

</form>
@endsection

@section('script')
    <script src="{{asset('js/change_questions.js')}}"></script>
@endsection
