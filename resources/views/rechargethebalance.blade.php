@extends('layouts.master')
@section('title', '5StarService')
@section('content')


    <style type="text/css">
    </style>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


<form action='/bill/store' method='POST'>
  <input type="hidden" name="client_id"  value="{{$user_id}}">
 
 {{ csrf_field() }}

  <div class="form-group">
    <label for="sum"> Введите сумму:</label> 
    <input type="number" name="sum" value="" class="form-control" id="sum">
  </div>

 <button type="submit" class="btn btn-primary btn-block">Оплатить</button>
</form>

@endsection
