@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>All users</h1>
@stop

@section('content')
<form action="#" method="post">
    Name <br>
    <input type="text"><br>
    E-mail <br>
    <input type="text"><br>
    Password <br>
    <input type="password"><br>
    Confirm Password <br>
    <input type="password"><br>
    Status <br>
    <input type="radio" name="status" value="1"/><br>
    <button>Submit</button>
</form>

@stop