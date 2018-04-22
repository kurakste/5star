@extends('layouts.master')

@section('title', 'HotLine')
@section('content')

<a class='bBack' href="/home"><img src="icon/left-80.png" alt="" width='60' /></a>

<div class="buffer"> </div>

<div class="std-card-square mdl-card mdl-shadow--2dp">
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
                    <div class='FlRight'>{{round ($user->balance(),2)}}</div>
                </li>
                <li><span class='SpLeft'>Объектов</span>
                    <div class='FlRight'>{{count($user['objects'])}}</div>
                </li>
            </ul>
    <div id=billingButtonWrapper>
        <a id='billingButton' href="/bill/details">БИЛЛИНГ</a >
    </div>
  </div>
</div>

@endsection
