@extends('layouts.master')
@section('title', '5StarService')
@section('content')


    <style type="text/css">
    </style>
    
<form action='/bill/store' method='POST'>
  <input type="hidden" name="client_id"  value="{{$user_id}}">
 
 {{ csrf_field() }}

  <div class="form-group">
    <label for="sum"> Введите сумму:</label> 
    <input type="number" name="sum" value=""  min='0' max='10000'class="form-control" id="sum">
  </div>

 <button type="submit" class="btn btn-primary btn-block">Оплатить</button>
</form>

@endsection
