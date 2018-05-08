@extends('layouts.master')
@section('title', '5StarService')
@section('content')

<a class='bBack' href="/info">
    <img src="/icon/left-80.png" alt="" width='60' />
</a>

<div class="buffer"> </div>
<div id='bill-table-wrapper'>

<form id="fSetBillingPeriod" action="/bill/details" method="get">
    <fieldset>
        <legend><b>ВЫБЕРЕТЕ ПЕРИОД:</b></legend>
        <label for="startDate">c </label>
        <input type="date" name="startDate" id="startDate" 
               value="{{ $startDate }}" />
        <label for="endDate"> по </label>
        <input type="date" name="endDate" id="endDate" 
               value="{{ $endDate }}" />
        <p><input id="bSetBillPeriodSubmit" type="submit" value="Обновить"></p>
    </fieldset>
</form>

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
            @if ($bill["created_at"])
                <td>{{ substr($bill["created_at"], 0, 10) }}</td>
            @else
                <td>-</td>
            @endif
            
            <td>{{ $bill["sum"] }}</td>
            <td>{{ $bill["type"] }}</td>
            <td>{{ $bill["comment"]}}</td>
        </tr>
     @endforeach     
    </table> 

</div>
 @endsection
