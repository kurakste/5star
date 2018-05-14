@extends('layouts.master')
@section('title', 'HLines.ru')
@section('content')

<a class='bBack' href="/info">
    <img src="/icon/left-80.png" alt="" width='60' />
</a>

<div class="buffer"> </div>
<div id='bill-table-wrapper'>

<form id="fSetBillingPeriod" action="/bill/details" method="get">
    <fieldset>
        <legend><b>выберете период:</b></legend>
        <label for="startdate">c </label>
        <input type="date" name="startdate" id="startdate" 
               value="{{ $startDate }}" />
        <label for="enddate"> по </label>
        <input type="date" name="enddate" id="enddate" 
               value="{{ $endDate }}" />
        <p><input id="bsetbillperiodsubmit" type="submit" value="обновить"></p>
    </fieldset>
</form>

    <table class='mdl-data-table'>
    <thead>
        <tr>
             <th>дата</th>
             <th>сумма</th>
             <th>тип</th>
             <th>примечание</th>
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
