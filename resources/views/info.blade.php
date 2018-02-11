@extends('layouts.master')

@section('title', 'HotLine')
@section('content')


    <button  
            class="backButton mdl-button mdl-js-button mdl-button--fab" id="">
     <a href="/objects"><i class="material-icons">keyboard_arrow_left</i></a> 

    </button>
<div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text">Информация</h2>
  </div>
  <div class="mdl-card__supporting-text">

            <ul id='info'>
                <li><span class='SpLeft'>Имя</span>
                    <div class='FlRight'>{{$user->name}}</div>
                </li>
                <li><span class='SpLeft'>Телефон</span>
                    <div class='FlRight'>{{$user['phone']}}</div>
                </li>
                <li><span class='SpLeft'>e-mail</span>
                    <div class='FlRight'>{{$user['email']}}</div>
                </li>
                <li><span class='SpLeft'>Город</span>
                    <div class='FlRight'>{{$user['city']}}</div>
                </li>
                <li><span class='SpLeft'>Баланс</span>
                    <div class='FlRight'>{{$user->balance()}}</div>
                </li>
                <li><span class='SpLeft'>Объектов</span>
                    <div class='FlRight'>{{count($user['objects'])}}</div>
                </li>
            </ul>
  </div>
</div>

@endsection
