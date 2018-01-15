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
    <li><span class='SpLeft'>Nickname</span><div class='FlRight'>{{$object->nick}}</div></li>
    <li><span class='SpLeft'>Менеджер</span><div class='FlRight'>{{$object->managername}}</div></li>
    <li><span class='SpLeft'>Телефон</span><div class='FlRight'>{{$object->managerphone}}</div></li>
    <li><span class='SpLeft'>Кол-во отзывов:</span><div class='FlRight'>{{$object->countOfFeedbacks()}}</div></li>
    <li><span class='SpLeft'>Средний бал:</span><div class='FlRight'>{{$object->avrgOffAllAnswer()}}</div></li>
</ul>

 <table class='table table-hover table-sm'>
    <thead>
        <tr>
             <th>id</th>
             <th>дата</th>
             <th>Имя</th>
             <th>Телефон</th>
             <th>Комментарий</th>
             <th>Средний бал</th>
             <th>Ответы</th>
        </tr>
    </thead>
     @foreach ($fbarray as $fb) 
        <tr>
            <td>{{$fb['id']}}</td>
            <td>{{$fb['created_at']}}</td>
            <td>{{$fb['Name']}}</td>
            <td>{{$fb['Phone']}}</td>
            <td>{{$fb['Comment']}}</td>
            <td>{{$fb->avrgAnswer()}}</td>
            <td><a href="/showanswer?fb_id={{$fb['id']}}&obj_id={{$object->id}}">анкета</a></td>
        </tr>
     @endforeach     
 </table>
 @endsection

