@extends('layouts.master')

@section('content')
<div class="login-wrapper">
    <div class='login-header'>
        <h5>восстановление пароля</h5>
    </div>

        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="email" type="email" class="mdl-textfield__input" name="email" value="{{ old('email') }}" required>
                <label for="email" class="mdl-textfield__label">E-Mail Address</label>
            </div> 
    
            <div id = 'button-inter'>
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    Send Password Reset Link
                </button>
            </div>
        </form>
</div>
@endsection
