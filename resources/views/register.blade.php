@extends('layouts.master')
@section('title','product')
@section('content')
<div>
    <form class="registerForm" method="post" action="{{ url('user/register') }}">
        <div class="formInput">
            <label>Firstname : </label>
            <input type="text" name="firstname">
        </div>
        <div class="formInput">
            <label>Lastname : </label>
            <input type="text" name="lastname">
        </div>
        <div class="formInput">
            <label>Email : </label>
            <input type="text" name="email">
        </div>
        <div class="formInput">
            <label>Password : </label>
            <input type="password" name="password">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">Register</button>
    </form>
</div>
@endsection