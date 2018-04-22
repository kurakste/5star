
@extends('layouts.master')
@section('title', '5StarService')
@section('content')

<a class='bBack' href="/info"><img src="/icon/left-80.png" alt="" width='60' /></a>

<div class="buffer"> </div>
<div id='bill-table-wrapper'>
    <table class='mdl-data-table'>
    <thead>
        <tr>
             <th>Дата</th>
             <th>Сумма</th>
             <th>Тип</th>
             <th>Примечание</th>
        </tr>
    </thead>
     @foreach ($bills as $bill) 
        <tr>
            @if ($bill->created_at)
                <td>{{ $bill->created_at->format('m.d.y') }}</td>
            @else
                <td>-</td>
            @endif
            
            <td>{{ $bill->sum }}</td>
            <td>{{ $bill->type }}</td>
            <td>{{ $bill->comment}}</td>
        </tr>
     @endforeach     
    </table> 
</div>
 @endsection
