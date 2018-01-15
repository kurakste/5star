
@extends('layouts.master')
@section('title', '5StarService')
@section('content')


 <table class='table table-sm'>
    <thead>
        <tr>
             <th>Дата</th>
             <th>Сумма</th>
             <th>Тип операции</th>
             <th>Примечание</th>

        </tr>
    </thead>
     @foreach ($bills as $bill) 
        <tr>
            <td>{{$bill->created_at}}</td>
            <td>{{$bill->sum}}</td>
            <td>{{$bill->type}}</td>
            <td>{{$bill->comment}}</td>
        </tr>
     @endforeach     
 </table> 
 @endsection
