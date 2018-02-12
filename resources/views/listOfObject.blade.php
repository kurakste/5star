@extends('layouts.master')

@section('title', 'HotLine')
@section('content')

<div id='objectListWrapper'>

    <!-- FAB button -->
    <button class="mdl-button mdl-js-button mdl-button--fab" id="addObjectButton">
      <a href="/object/add"><i class="material-icons">add</i></a> 
    </button>

    <button  
            class="backButton mdl-button mdl-js-button mdl-button--fab" >
     <a href="/home"><i class="material-icons">keyboard_arrow_left</i></a> 

    </button>

    @foreach ($user->objects as $object)
    <div class="buffer"> </div>
    <div class="mdl-card mdl-shadow--2dp objListCard">
      <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">{{$object->nick}}</h2>
      </div>
      <div class="mdl-card__supporting-text">

                        <ul id='objCard'>
                            <li><span class='SpLeft'>Никнейм</span>
                                <div class='FlRight'>{{$object->nick}}</div>
                            </li>
                            <li><span class='SpLeft'>Менеджер</span>
                                <div class='FlRight'>{{$object->managername}}</div>
                            </li>
                            <li><span class='SpLeft'>Телефон</span>
                                <div class='FlRight'>{{$object->managerphone}}</div>
                            </li>
                            <li><span class='SpLeft'>Город</span>
                                <div class='FlRight'>{{$object->city}}</div>
                            </li>
                            <li><span class='SpLeft'>Адрес</span>
                                <div class='FlRight'>{{$object->addr}}</div>
                            </li>
                            <li><span class='SpLeft'>Примечания</span>
                                <div class='FlRight'>{{$object->notes}}</div>
                            </li>
                            <li><span class='SpLeft'>Кол-во отзывов</span>
                                <div class='FlRight'>{{$object->countOffeedbacks()}}</div>
                            </li>
                            <li><span class='SpLeft'>Ср. оценка</span>
                                <div class='FlRight'>{{$object->avrgOffAllAnswer()}}</div>
                            </li>
                        </ul>

                            
                        <div id='objButtonPanel'>
                            {!! Form::open(['url'=>'object/edit','method'=>'POST'])  !!}
                            <input type="hidden" name="fclient_id" value="{{$user->id}}" >
                            <input type="hidden" name="id" value="{{$object->id}}" >
                            <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj">
                            <i class="fas fa-edit"></i></button>
                            {!! Form::close() !!}
                            {!! Form::open(['url'=>'object/delete','method'=>'POST'])  !!}
                            <input type="hidden" name="fclient_id" value="{{$user->id}}" >
                            <input type="hidden" name="id" value="{{$object->id}}" >
                            <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj">
                            <i class="fas fa-trash-alt"></i></button>

                            {!! Form::close() !!}
                            {!! Form::open(['url'=>'showfb','method'=>'POST'])  !!}
                            <input type="hidden" name="id" value="{{$object->id}}" >
                            <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj">
                            <i class="fas fa-search"></i></button>
                            {!! Form::close() !!}
                            {!! Form::open(['url'=>'changequestions','method'=>'POST'])  !!}
                            <input type="hidden" name="id" value="{{$object->id}}" >
                            <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj">
                            <i class="fas fa-list-ul"></i></button>
                            {!! Form::close() !!}
                            {!! Form::open(['url'=>'downloadQR','method'=>'POST'])  !!}
                            <input type="hidden" name="id" value="{{$object->id}}" >
                            <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj">
                            <i class="fas fa-qrcode"></i></button>
                            {!! Form::close() !!}
                            {!! Form::open(['url'=>'_posters','method'=>'POST'])  !!}
                            <input type="hidden" name="id" value="{{$object->id}}" >
                            <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj">
                            <i class="far fa-images"></i></button>
                            {!! Form::close() !!}

                            {!! Form::open(['url'=>'/banner','method'=>'POST'])  !!}
                            <input type="hidden" name="id" value="{{$object->id}}" >
                            <button type="subbmit" class="btn btn-outline-success btn-sm btn_obj">
                            <i class="far fa-newspaper"></i></button>
                            <a href="/fb/{{$user->id}}-{{$object->nick}}" 
                            class="btn btn-outline-success btn-sm btn_obj">
                            <i class="fa fa-link"></i></a>
                            {!! Form::close() !!}
                       </div> 

      </div> <!--mdl-card__supporting-text -->
    </div> <!--demo-card-square -->
    @endforeach
      <div class="mdl-card__actions mdl-card--border" id="backtohomeObjects">
      </div>

</div> <!-- wrapper -->
@endsection

@section('script')


@endsection
