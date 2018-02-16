@extends('layouts.master')
@section('title', 'HotLine')
@section('content')

    <a class='bBack' href="/objects"><img src="/icon/left-80.png" alt="" width='60' /></a>

    <div class="buffer"> </div>

    @foreach ($fbarray as $fb)
    <div class="mdl-card mdl-shadow--2dp editObjectCard">
      <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">hi!</h2>
      </div>
      <div class="mdl-card__supporting-text">
    <div class="wrapper">
            <ul class ='fbLeft'>
              <li class = 'rw'>дата</li>
              <li class = 'rw'>Имя</li>
              <li class = 'rw'>Телефон</li>
              <li class = 'rw'>Ср. бал</li>
              <li class = 'rw'>Ответы</li>
            </ul>
            <ul class='fbRight'>
                <li>{{Carbon\Carbon::parse($fb['created_at'])->format('d-m-y')}}</li>
                <li> {{$fb['name']}}</li>
                <li> {{$fb['phone']}}</li>
                <li> {{$fb->avrgAnswer()}}</li>
                <li> <a href="/showanswer?fb_id={{$fb['id']}}&obj_id={{$object->id}}">анкета</a></li>
            </ul>
     </div>
        <div class="clearBlock"></div>
        <p>Комментарий:</p>
        <div class="comment"><p>{{$fb['comment']}}</p></div>
    </div>
  </div>
            @endforeach
 @endsection


