@extends('layouts.master')

@section('title', 'HotLine')
@section('content')

    <a class='bBack' href="/objects"><img src="/icon/left-80.png" alt="" width='60' /></a>

    @foreach ($fbarray as $fb)
    <div class="show-fb-card">
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
                    <li> <a href="/showanswer?fb_id={{$fb['id']}}&obj_id={{$fb['object_id']}}">анкета</a></li>
                </ul>
        
        <div class="clearBlock"></div>
            <p class='p-fb'>Комментарий:</p>
            <p  class='p-fb'>{{$fb['comment']}}</p>
        </div> <!-- wrapper -->

    </div> <!-- supporting-text -->
  @endforeach
 @endsection


