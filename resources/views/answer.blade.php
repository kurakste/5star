@extends('layouts.master')
@section('title', 'HotLine')
@section('content')


    <style type="text/css">

        .container-fluid {
            min-height: 600px;
        }
        .wrapper  {

            font-size: 0.7rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            margin: 5px;
            /* height: 420px; */
            text-transform: uppercase;
            color: #27282d;
            background-color: #fbfbfb;
            padding-bottom: 20px;
        }
        .border {
            position: relative;
            padding-top: 2vh;
            padding-left: 2vh;
            padding-right: 2vh;
            top:1.7vh;
            left: 2vw;
            border: solid #aa9e72 1px;
            height: 80%;
            width:95%;
        }


        ul {
            list-style-type:none;
            padding-left:3%;
            padding-left:1%;
            width:98%;

        }

        .float-btn {
        margin:5px;
        width: 50px;
        }

        .addModule {
        position: fixed;
        top: 70px;
        right : 10px;
        z-index: 100;
        }

        #clientData ul li:last-child, #objectsData ul li:last-child {
        border-bottom: solid 0px gray;

        }
        .FlRight  {
            width:60%;
            text-align:left;
            overflow:hidden;
            max-height:1.4em;
            float:right;
        }

    </style>

<div class="container-fluid">
    <div class="addModule">
        <button type ='submit' form = 'mainForm' class="btn btn-outline-success float-btn"><i class="fas fa-angle-left"></i></button>
    </div>

    {!! Form::open(['url'=>'showfb','method'=>'POST', 'id'=>'mainForm'])  !!}
    <input type="hidden" name="id" value="{{$obj_id}}" >
    {!! Form::close() !!}

    <div class="wrapper">
        <div class="border">

                    <ul>
                        <li><span class='SpLeft'>Дата:</span><div class='FlRight'>{{$fb->created_at}}</div></li>
                        <li><span class='SpLeft'>Имя:</span><div class='FlRight'>{{$fb->name}}</div></li>
                        <li><span class='SpLeft'>Телефон:</span><div class='FlRight'>{{$fb->phone}}</div></li>
                        <li><span class='SpLeft'>Комментарий:</span></li>
                    </ul>
            <div>
                <p>{{$fb->comment}}</p>
            </div>

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
        </div> <!--border -->
    </div>    <!--wrapper -->
</div> <!-- container-fluid -->
 @endsection

