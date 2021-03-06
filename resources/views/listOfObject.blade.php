@extends('layouts.master')

@section('title', 'HotLine')
@section('content')

     <a href="/object/add"><img class=bAdd src="icon/add-80.png" alt="" width='60'/></a> 

     <a class='bBack' href="/home"><img src="icon/left-80.png" alt="" width='60' /></a>

<div id='objectListWrapper'>

    @foreach ($user->objects as $object)
    <div class="buffer"> </div>
    <div class="mdl-card mdl-shadow--2dp objListCard">
      <div class="mdl-card__title mdl-card--expand object-title">
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
             <li><span class='SpLeft'>Отзыв</span>
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
                <button type="subbmit"  class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab obj-button">
                <img class='obj-icon' src="icon/edit_small.png" alt="" style=""/>
                </button>
                {!! Form::close() !!}

                {!! Form::open(['url'=>'object/delete','method'=>'POST'])  !!}
                <input type="hidden" name="fclient_id" value="{{$user->id}}" >
                <input type="hidden" name="id" value="{{$object->id}}" >
                <button type="subbmit"  class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab obj-button">
                <img class='obj-icon' src="icon/del_small.png" alt="" style=""/>
                </button>
                {!! Form::close() !!}

                {!! Form::open(['url'=>'showfb','method'=>'POST'])  !!}
                <input type="hidden" name="id" value="{{$object->id}}" >
                <button type="subbmit"  class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab obj-button">
                <img class='obj-icon' src="icon/fblist_small.png" alt="" style=""/>
                {!! Form::close() !!}

                {!! Form::open(['url'=>'changequestions','method'=>'POST'])  !!}
                <input type="hidden" name="id" value="{{$object->id}}" >
                <button type="subbmit" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab obj-button">
                <img src="icon/edit_small.png" alt="" style=""/>
                {!! Form::close() !!}
                {!! Form::open(['url'=>'downloadQR','method'=>'POST'])  !!}
                <input type="hidden" name="id" value="{{$object->id}}" >
                <button type="subbmit"  class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab obj-button">
                <img class='obj-icon' src="icon/qr_small.png" alt="" style=""/>
                {!! Form::close() !!}

                {!! Form::open(['url'=>'_posters','method'=>'POST'])  !!}
                <input type="hidden" name="id" value="{{$object->id}}" >
                <button type="subbmit"  class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab obj-button">
                <img class='obj-icon' src="icon/banners_small.png" alt="" style=""/>
                {!! Form::close() !!}

                <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab btnGetLinkForFB"
                data-id = '{{ $object->id }}'>

                <img src="icon/link_small.png" alt="" style=""/>
                </button>

                <a href="/fb/{{$user->id}}-{{$object->nick}}" >
                <img src="/icon/check_30.png" alt="" /></a>
                            
                <input  type='text' size = '30' 
                        class ='fbLinkField'
                        value = "{{ url('/')}}/fb/{{$user->id}}-{{$object->nick}}"
                        id = 'linkField-{{ $object->id }}'>
                </input>
                       </div> 

      </div> <!--mdl-card__supporting-text -->
    </div> <!--demo-card-square -->
    @endforeach
      <div class="mdl-card__actions mdl-card--border" id="backtohomeObjects">
      </div>

</div> <!-- wrapper -->
@endsection

@section('script')
<script src= "js/objects.js"></script>

@endsection
