@extends('layouts.master')

@section('content')
<div class="login-wrapper">
    <div class='login-header'>
        <h5>восстановление пароля</h5>
    </div>

    @if (session('status'))                                                                                                           <div class="alert alert-success">
      {{ session('status') }}
      </div>
    @endif

        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="email" type="email" class="mdl-textfield__input" name="email" value="{{ old('email') }}" required>
                <label for="email" class="mdl-textfield__label">E-Mail Address</label>
            </div> 
    
             @if ($errors->has('email'))                                                                                                        
                 <span class="invalid-feedback">
                     <strong>{{ $errors->first('email') }}</strong>
                 </span>
             @endif

            <div id = 'button-inter'>
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    Send Password Reset Link
                </button>
            </div>
        </form>
</div>
@endsection
