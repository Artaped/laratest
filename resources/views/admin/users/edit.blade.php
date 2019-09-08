@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Update User</h1>
@stop

@section('content')
    @include('messages.status')
    <form action="/admin/users/edit/{{ $user->id }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        Name <br>
        <input type="text" name="name" value="{{ $user->name }}"><br>
        E-mail <br>
        <input type="text" name="email" value="{{ $user->email  }}"><br>
        Password <br>
        <input type="password" name="password" value="{{ $user->password }}"><br>
        Confirm Password <br>
        <input type="password" name="password_confirmation" value="{{ $user->password }}><br>
        Status : {{ $user->status? "active" : "passive" }} <br>
        Active <input type="radio" name="status" value="1"/> <br>
        Passive <input type="radio" name="status" value="0" checked/> <br>
        Аватар <br>
        <img src="{{ $user->getImage() }}" alt="">
        <input type="file" name="avatar">
        <button type="submit">Submit</button>
    </form>
@stop