@extends('layouts.master')

@section('content')

<div class="login-wrapper">
    <div class='login-header'>
        <h5>сброс пароля:</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="email" type="email" class="mdl-textfield__input" name="email" value="{{ $email or old('email') }}" required autofocus>
                <label for="email" class="mdl-textfield__label">E-Mail Address</label>
            </div>

            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
  
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="password" type="password" class="mdl-textfield__input" name="password" required>
                <label for="password" class="mdl-textfield__label">Password</label>
            </div>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="password-confirm" type="password" class="mdl-textfield__input" name="password_confirmation" required>
                <label for="password-confirm" class="mdl-textfield__label">Confirm Password</label>
            </div>

                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                    Reset Password
                                </button>
        </form>
<div>
@endsection
