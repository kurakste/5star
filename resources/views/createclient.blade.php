@extends('layouts.master')

@section('content')
<h1>New Client.</h1>
<hr/>

{!! Form::open(['url'=>'storeclient'])  !!}

<div class="form-group">
{!! Form::label('vender_id','Vender_id:') !!}
{!! Form::text('vender_id',null,['class'=>'form-control',]) !!}
</div>

<div class="form-group">
{!! Form::label('name','Введите удобное для Вас обращение:') !!}
{!! Form::text('name',null,['class'=>'form-control']) !!}
<small id="hname" class="form-text text-muted">Введите удобное для Вас обращение:</small>
</div>

<div class="form-group">
{!! Form::label('phone','Ведите номер вашего телефона:') !!}
{!! Form::text('phone',null,['class'=>'form-control']) !!}
<small id="hphone" class="form-text text-muted">Номер телефона будет использоваться для входа в программу.</small>
</div>

<div class="form-group">
{!! Form::label('city','Город:') !!}
{!! Form::text('city',null,['class'=>'form-control']) !!}
<small id="hphone" class="form-text text-muted">Номер телефона будет использоваться для входа в программу.</small>
</div>

<div class="form-group">
{!! Form::label('pin','Pin:') !!}
{!! Form::text('pin',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
{!! Form::submit('Сохранить',['class'=>'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}
@stop
