@extends('layouts.master')

@section('content')
<div class="login-wrapper">
    <div class='login-header'>
        <h5>Регистрация:</h5>
    </div>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="name" type="text" class="mdl-textfield__input" name="name" value="{{ old('name') }}" required autofocus>
                    <label class="mdl-textfield__label" for="name">Name</label>
                </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="email" type="email" class="mdl-textfield__input" name="email" value="{{ old('email') }}" required>
                    <label for="email" class="mdl-textfield__label">E-Mail Address</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="password" type="password" class="mdl-textfield__input" name="password" required>
                    <label for="password" class="mdl-textfield__label">Password</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="password-confirm" type="password" class="mdl-textfield__input" name="password_confirmation" required>
                    <label for="password-confirm" class="mdl-textfield__label">Confirm Password</label>
                </div>
                <div id = 'button-inter'>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Register</button>
                </div>
            </form>
</div>
@endsection
