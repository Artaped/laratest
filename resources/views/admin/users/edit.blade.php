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
        <label>
            <input type="text" name="name" value="{{ $user->name }}">
        </label><br>
        E-mail <br>
        <label>
            <input type="text" name="email" value="{{ $user->email  }}">
        </label><br>
        Password <br>
        <label>
            <input type="password" name="password" value="{{ $user->password }}">
        </label><br>
        Confirm Password <br>
        <label>
            <input type="password" name="password_confirmation" value="{{ $user->password }}">
        </label><br>
        Status : {{ $user->status? "active" : "passive" }} <br>
        Active <label>
            <input type="radio" name="status" value="1"/>
        </label> <br>
        Passive <label>
            <input type="radio" name="status" value="0" checked/>
        </label> <br>
        Аватар <br>
        <img src="{{ $user->getImage() }}" alt="">
        <input type="file" name="avatar">
        <button type="submit">Submit</button>
    </form>
@stop