@extends('layouts.master')
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

    <form action="/fb/store" method="post">
     {{ csrf_field() }}

    <input type="hidden" name="id"  value="{{$object_id}}"> <!--передаем id ОБЪЕКТА для которого составлен отзыв. -->

    <input type="hidden" name="countofquestions"  value="{{count($questions)}}"> <!--передаем кол-во вопросов в анкете. -->
  <div class="form-group">
    <label for="fname">Введите удобное для вас обращение:</label> 
    <input type="text" name="fname" value=""class="form-control" id="fname" aria-describedby="HManager" placeholder="Как к вам удобно обратиться?" >
  </div>
  <div class="form-group">
    <label for="fphone">Телефон:</label> 
    <input type="text" name="fphone" value="" class="form-control" id="fphone" aria-describedby="HPhone" placeholder="Введите номер вашего телефона." >
    <small id="hphone" class="form-text text-muted">Введите ваш номер телефона с кодом (89176450029) (11-ть цифр номера. Например: 89869347745)</small>
  </div>

    @foreach ($questions as $question)
  <div class="form-group">
        
        <input type="hidden" name="question_id_{{$loop->index}}"  value="{{$question->id}}"> <!--передаем id ВОПРОСА -->
        <label for="{{$name='fquestion_'.$loop->index}}">{{$question->question}}</label> 
    <input type="number" name="{{$name}}" value="" class="form-control" id="{{$name}}" placeholder="Введите вашу оценку" required>
  </div>
    @endforeach
    

  <div class="form-group">
    <label for="fnotes">Примечания:</label> 
    <input type="text" class="form-control" name="fnotes" value="" id="fnotes" aria-describedby="hnotes" placeholder="Расскажите нам о ваших впечатлениях." >

    <small id="hnotes" class="form-text text-muted">Расскажите нам, что бы вы улучшели в нашем заведении. Спасибо!</small>
  </div>

     <button type="submit" class="btn btn-primary btn-block">Отправить отзыв.</button>
</form>
@endsection
