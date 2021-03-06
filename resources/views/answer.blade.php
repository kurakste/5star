@extends('layouts.master')
@section('title', 'HotLine')
@section('content')

<div class='AnswerWrapper'>
     <button form="mainForm" type="submit" class="bBack"><img src="icon/left-80.png" alt="" width='60' /></button>
    <div class="buffer"> </div>

    <div class="mdl-card mdl-shadow--2dp objListCard">
      <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">Отзыв от {{$fb->name}}</h2>
      </div>

    {!! Form::open(['url'=>'showfb','method'=>'POST', 'id'=>'mainForm'])  !!}
    <input type="hidden" name="id" value="{{$obj_id}}" >
    {!! Form::close() !!}
      <div class="mdl-card__supporting-text">


            <ul id='answer'>
                <li><span class='SpLeft'>Дата:</span><div class='FlRight'>{{$fb->created_at}}</div></li>
                <li><span class='SpLeft'>Имя:</span><div class='FlRight'>{{$fb->name}}</div></li>
                <li><span class='SpLeft'>Телефон:</span><div class='FlRight'>{{$fb->phone}}</div></li>
                <li><span class='SpLeft'>Комментарий:</span></li>
            </ul>
        <div>
            <p>{{$fb->comment}}</p>
        </div>

        <table id="answerTab" >
           <thead>
               <tr>
                    <th>ВОПРОС</th>
                    <th>ОТВЕТ</th>
               </tr>
           </thead>
            @foreach ($data as $out)
               <tr>
                   <td>{{$out['question']}}</td>
                   <td>{{$out['answer']}}</td>
               </tr>
            @endforeach
        </table>


    </div>    <!--mdl-card__supporting-text-->
</div> <!-- AnswerWrapper-->
 @endsection

