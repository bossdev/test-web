@extends('layouts.master')
@section('title','product')
@section('content')
<div>
    <form class="loginForm" method="post" action="{{ url('user/login') }}">
        <div class="formInput">
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <label>Username or email : </label>
            <input type="text" name="email">
        </div>
        <div class="formInput">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <label>Password : </label>
            <input type="password" name="password">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">Login</button>
    </form>
</div>
@endsection