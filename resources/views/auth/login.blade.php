@extends('layouts.master')

@section('content')
<div class="login-wrapper">
    <div class='login-header'>
        <h3>войти</h3>
    </div>
    
    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mdl-textfield mdl-js-textfield">
            <input id="email" type="email" class="mdl-textfield__input" name="email" value="{{ old('email') }}" required autofocus>
            <label for="email" class="mdl-textfield__label">E-Mail Address</label>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}  mdl-textfield mdl-js-textfield">
            <input id="password" type="password" class="mdl-textfield__input" name="password" required>
            <label for="password" class="mdl-textfield__label">Password</label>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>
<!--
        <label  class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember">
            <input class = "mdl-checkbox__input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span class="mdl-checkbox__label"> Remember Me</span></label>
-->
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember">
          <input type="checkbox" id="remember" name = "remember" class="mdl-checkbox__input" {{ old('remember') ? 'checked' : '' }}>
          <span class="mdl-checkbox__label">Запомнить меня</span>
        </label>


        <div class="form-group" id="button-inter">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    Войти
                </button>
            <div class='fogot-your-password'>
                <a  href="{{ route('password.request') }}">
                    Забыли пароль?
                </a>    
            <div class='fogot-your-password'>
                <a href="/register">Зарегистрироваться.</a>
            </div>    
            </div>
        </div>
    </form>
</div>
@endsection
