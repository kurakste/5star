
@extends('layouts.master')
@section('title', '5StarService')
@section('content')


    <style type="text/css">
    </style>
    
<form action='/changequestions/store' method='POST' id="fMain">
  <input type="hidden" name="object_id"  value="{{$object_id}}"> 
  <input type="hidden" id="count_of_question" name="count"  value="2">
 
  {{ csrf_field() }}

  <div class="form-group" id="fg-1">
    <label for="question_1" id="label-1">Вопрос 1</label>
    <input type="text" name="question_1" value=""  class="form-control" id="FNickname" aria-describedby="HNickname" placeholder="Введите ваш вопрос." required pattern="^[0-9a-zA-Zа-яА-Я\s.,:;!?]+$">
    <a class="btn btn-primary btn-sm btn_del" id="bRemoveQuestion-1" data-question="1" href="#" role="button">X</a>
  </div>
  <div class="form-group" id="fg-2">
      <label for="question_2" id="label-2">Вопрос 2</label>
      <input type="text" name="question_2" value=""  class="form-control" id="FNickname" aria-describedby="HNickname" placeholder="Введите ваш вопрос." required pattern="^[0-9a-zA-Zа-яА-Я\s.,:;!?]+$">
      <a class="btn btn-primary btn-sm btn_del" id="bRemoveQuestion-2" data-question="2" href="#" role="button">X</a>
  </div>

    <a class="btn btn-primary btn-sm btn_cl btn-block" href="#" role="button" id="bAddQuestion">Добавить вопрос</a>
    <button type="submit" class="btn btn-primary btn-block">Сохранить</button>

</form>
@endsection

@section('script')
    <script src="{{asset('js/change_questions.js')}}"></script>
@endsection
