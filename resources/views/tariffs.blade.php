@extends('layouts.master')
@section('title', '5StarService')
@section('content')
        <table class='table table-sm'>
            <thead>
                <tr>
                    <th>Название тарифа</th>
                    <th>Максимальное кол-во объектов</th>
                    <th>Стоимость в месяц</th>
                    <th>Описание</th>
                </tr>
            </thead>

            @foreach ($tariffs as $tariff)
            <tr>
                <td>{{$tariff['name']}}</td>
                <td>{{$tariff['max_object']}}</td>
                <td>{{$tariff['sum']}}</td>
                <td>{{$tariff['note']}}</td>
            </tr>
            @endforeach
        </table>
@endsection

