@extends('layouts.master')
@section('title', '5StarService')
@section('content')


    <button  
            class="backButton mdl-button mdl-js-button mdl-button--fab" >
     <a href="/home"><i class="material-icons">keyboard_arrow_left</i></a> 
    </button>

    <div class="mdl-card mdl-shadow--2dp objListCard">
      <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">Пополнить счет</h2>
      </div>
      <div class="mdl-card__supporting-text">

    <form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">    
        <input type="hidden" name="receiver" value="410015977582606">    
        <input type="hidden" name="formcomment" value="Оплата сервиса HotLine">    
        <input type="hidden" name="short-dest" value="Оплата сервиса HotLine">    
        <input type="hidden" name="label" value="$order_id">    
        <input type="hidden" name="quickpay-form" value="donate">    
        <input type="hidden" name="targets" value="транзакция {order_id}">    
        <input name="sum" value="500" data-type="number">    
        <input type="hidden" name="comment" value="Хотелось бы получить дистанционное управление.">
        <input type="hidden" name="need-fio" value="false">
        <input type="hidden" name="need-email" value="false">
        <input type="hidden" name="need-phone" value="false">
        <input type="hidden" name="need-address" value="false">
        <div>
            <label><input type="radio" checked name="paymentType" value="AC">Банковской картой</label>    
            <label><input type="radio" name="paymentType" value="PC">Яндекс.Деньгами</label>    
        </div>
        <input type="submit" value="Перевести">
    </form>

  </div> <!--mdl-card__supporting-text -->
</div> <!--demo-card-square -->


<!--

<form action='/bill/store' method='POST'>
  <input type="hidden" name="client_id"  value="{{$user_id}}">
 
 {{ csrf_field() }}

  <div class="form-group">
    <label for="sum"> Введите сумму:</label> 
    <input type="number" name="sum" value="" class="form-control" id="sum">
  </div>

 <button type="submit" class="btn btn-primary btn-block">Оплатить</button>
</form>
-->
@endsection
