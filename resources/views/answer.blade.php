@extends('layouts.master')
@section('title', '5StarService')
@section('content')


    <style type="text/css">
       #clientData {
            padding-bottom:5%;
            border-bottom:solid gray 3px;
            margin-bottom:6%;
        }
        #objectsData {
            padding-bottom:5%;
            border-bottom:solid gray 3px;
            margin-bottom:6%;
        }

        #clientData ul, #objectsData ul{
            list-style-type:none;
            width:98%;
        }

        ul {
            padding-left:3%;
            padding-left:1%;
        }
        #clientData ul li, #objectsData ul li {
            border-bottom: solid 1px black;

        }
        .FlRight  {
            width:60%;
            text-align:left;
            overflow:hidden;
            max-height:1.4em;
        }
        .btn-grp {
            width:100%;
            text-align:center;
            margin:14%;
        }
        .btn {
            width:40%;
        }

        #clientData ul li:last-child, #objectsData ul li:last-child {
            border-bottom: solid 0px gray;

        }
        .FlRight {
            float:right;
        }
        .SpLeft {
        }
    </style>

<!--<div class="row" id='clientData'> -->
<ul>

    <li><span class='SpLeft'>Дата:</span><div class='FlRight'>{{$fb->created_at}}</div></li>
    <li><span class='SpLeft'>Имя:</span><div class='FlRight'>{{$fb->name}}</div></li>
    <li><span class='SpLeft'>Телефон:</span><div class='FlRight'>{{$fb->phone}}</div></li>
    <li><span class='SpLeft'>Комментарий:</span><div class='FlRight'>{{$fb->comment}}</div></li>
</ul>
 <table class='table table-sm'>
    <thead>
        <tr>
             <th>Вопрос</th>
             <th>Ответ</th>
        </tr>
    </thead>
     @foreach ($data as $out) 
        <tr>
            <td>{{$out['question']}}</td>
            <td>{{$out['answer']}}</td>
        </tr>
     @endforeach     
 </table> 
 @endsection

