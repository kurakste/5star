
@extends('layouts.master')

@section('content')

    <button  
            class="backButton mdl-button mdl-js-button mdl-button--fab" >
     <a href="/home"><i class="material-icons">keyboard_arrow_left</i></a> 
    </button>

    <button type="submit" form ="settingForm" 
            class="mdl-button mdl-js-button mdl-button--fab" id="editObjectButton">
      <a href="/storesettings"><i class="material-icons">save</i></a> 
    </button>

    <div class="buffer"> </div>
    <div class="mdl-card mdl-shadow--2dp editObjectCard">
      <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text"> Настройки</h2>
      </div>
      <div class="mdl-card__supporting-text">

            {!! Form::open(['url'=>'/storesettings', 'id'=>'settingForm'])  !!}
            {{ csrf_field() }}

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="name">Ползователь:</label>
                    <input type="text" name="name" value="{{$user->name}}"  
                    class="mdl-textfield__input" id="fname"  
                    placeholder="Введите никнейм вашего объекта." 
                    required pattern="^[A-Za-zа-яА-Я0-9\s]+$">
                </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="city">Город:</label>
                    <input type="text" name="city" value="{{$user->city}}"  
                    class="mdl-textfield__input" id="fcity"  
                    placeholder="Введите название города" 
                    required pattern="^[A-Za-zа-яА-Я0-9\s]+$">
                </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="fphone">Телефон:</label>
                    <input type="text" name="phone" value="{{$user->phone}}"  
                    class="mdl-textfield__input" id="fphone"  
                    placeholder="Введите телефон" 
                    required >
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="fmail">email:</label>
                    <input type="text" name="email" value="{{$user->email}}"  
                    class="mdl-textfield__input" id="fmail"  
                    placeholder="Введите email" 
                    required >
                </div>
                
                <p>ОТПРАВЛЯТЬ НА ПОЧТУ:</p>
                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect swch-in-setting" 
                                for="send_each_fb">
                      <span class="mdl-switch__label">   КАЖДЫЙ
                      ОТЗЫВ</span>
                      <input type="checkbox" id="send_each_fb" class="mdl-switch__input"
                      name="send_each_fb" 
                      @if ($user->settings['send_each_fb'])
                        checked
                      @endif  
                        >
        		    </label>

                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect swch-in-setting" 
                                for="send_daily_report">
                      <span class="mdl-switch__label">   ЕЖЕДНЕВНЫЙ ОТЧЕТ </span>
                      <input type="checkbox" id="send_daily_report" class="mdl-switch__input"
                      name="send_daily_report" 
                      @if ($user->settings['send_daily_report'])
                        checked
                      @endif  
                        >
        		    </label>

                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect swch-in-setting" 
                                for="send_weekly_report">
                      <span class="mdl-switch__label">   ЕЖЕНЕДЕЛЬНЫЙ ОТЧЕТ </span>
                      <input type="checkbox" id="send_weekly_report" class="mdl-switch__input"
                      name="send_weekly_report" 
                      @if ($user->settings['send_weekly_report'])
                        checked
                      @endif  
                        >
        		    </label>

                {!! Form::close() !!}
        </div>
    </div>

<!--
            <div id="card_1">
                <div class="left">
                    <div class="form-group">
                        {!! Form::label('name', 'пользователь') !!}
                        {!! Form::text('name',$user->name,['class'=>'form-control col-11', 'id'=>'fname']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('city','Город:') !!}
                        {!! Form::text('city',$user->city,['class'=>'form-control col-11', 'id'=>'fcity']) !!}
                    </div>
                </div>

                <div class="right">
                    <div class="form-group">
                        {!! Form::label('phone','телефон') !!}
                        {!! Form::text('phone',$user->phone,['class'=>'form-control col-11', 'id'=>'fphone']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email','email:') !!}
                        {!! Form::text('email',$user->email,['class'=>'form-control col-11', 'id'=>'fmail']) !!}
                    </div>
                </div>
                <div class = 'button-group '>
                    <a href='#' class="btn bPrev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                    <a href="/home" class="btn bCancel"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <a href="#" class="btn bOk" ><i class="fa fa-check" aria-hidden="true"></i></a>
                    <a href='#' class="btn bNext" ><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>

            </div> <!-- page-1 -->
            <div id="card_2" style="display: none;">
                <p>Отправлять на почту:</p>
                <div class="form-group">
                    {!! Form::label('leach_fb_checkbox','каждый отзыв:') !!}
                    {!! Form::checkbox('send_each_fb','send_each_fb',$user->settings['send_each_fb']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('lw_checkbox','ежедневный отчет:') !!}
                    {!! Form::checkbox('send_daily_report','send_daily_report',$user->settings['send_daily_report']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('wrcheckbox','еженедельный отчет:') !!}
                    {!! Form::checkbox('send_weekly_report','send_weekly_report', $user->settings['send_weekly_report']) !!}
                </div>
                <div class = 'button-group'>
                     <a href='#' class="btn bPrev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                     <a href="/home" class="btn bCancel" ><i class="fa fa-times" aria-hidden="true"></i></a>
                     <a href="#" class="btn bOk"><i class="fa fa-check" aria-hidden="true"></i></a>
                     <a href='#' class="btn bNext"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

    </div> -->
@stop
@section('script')
@endsection
