@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>All users</h1>
@stop

@section('content')

    @include('messages.status')
    <form onSubmit="return validate()" action="{{ route('user.store') }}" method="post">
        {{ csrf_field() }}
        Name <br>
        <input type="text" name="name" required><br>
        E-mail <br>
        <input type="text" name="email" required><br>
        Password <br>
        <input type="password" name="password" id="password" required><br>
        Confirm Password <br>
        <input type="password" name="password_confirmation" id="password_confirmation" required><br>
        Status <br>
        Active User<input type="radio" name="status" value="1" ><br>
        Passive User<input type="radio" name="status" value="0" checked><br>
        <button type="submit">Submit</button>
    </form>

@stop