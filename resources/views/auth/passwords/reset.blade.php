@extends('layouts.master')

@section('content')
<div class="login-wrapper">
    <div class='login-header'>
        <h5>сброс пароля:</h5>
    </div>
<form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

            <button type="submit" class="btn btn-primary">
                Reset Password
            </button>
</form>
</div>
@endsection
