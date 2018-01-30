@extends('layouts.master')

@section('content')
<h2>настройки</h2>
<hr/>

{!! Form::open(['url'=>'/storesettings'])  !!}
{{ csrf_field() }}

<div class="form-group">
{!! Form::label('name', 'Имя пользователя') !!}
{!! Form::text('name',$user->name,['class'=>'form-control']) !!}
<small id="hname" class="form-text text-muted">Введите удобное для Вас обращение:</small>
</div>

<div class="form-group">
{!! Form::label('phone','Ведите номер вашего телефона:') !!}
{!! Form::text('phone',$user->phone,['class'=>'form-control']) !!}
<small id="hphone" class="form-text text-muted">Номер телефона будет использоваться для входа в программу.</small>
</div>

<div class="form-group">
{!! Form::label('email','email:') !!}
{!! Form::text('email',$user->email,['class'=>'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('city','Город:') !!}
{!! Form::text('city',$user->city,['class'=>'form-control']) !!}
<small id="hcity" class="form-text text-muted">Город.</small>
</div>

<div class="form-group">
    {!! Form::label('leach_fb_checkbox','Отправлять каждый отзыв на почту:') !!}
    {!! Form::checkbox('send_each_fb','send_each_fb',$user->settings['send_each_fb']) !!}
</div>

<div class="form-group">
    {!! Form::label('lw_checkbox','Отправлять ежедневный отчет на почту:') !!}
    {!! Form::checkbox('send_daily_report','send_daily_report',$user->settings['send_daily_report']) !!}
</div>

<div class="form-group">
    {!! Form::label('wrcheckbox','Отправлять еженедельный отчет на почту:') !!}
    {!! Form::checkbox('send_weekly_report','send_weekly_report', $user->settings['send_weekly_report']) !!}
</div>

<div class="form-group">
{!! Form::submit('Сохранить',['class'=>'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}
@stop
