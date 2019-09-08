@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add News</h1>
@stop

@section('content')
    @include('messages.status')
    <form action="{{ route('news.store') }}" method="post">
        {{ csrf_field() }}
        Title <br>
        <input type="text" name="title" required><br>
        Authors <br>
        <label for='users[]'>Select Authors:</label><br>
        <select multiple="multiple" name="users[]">
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{ $user->name }}</option>
            @endforeach
        </select><br>
        Text <br>
        <textarea name="text"  id="" cols="30" rows="10" required></textarea><br>
        Status <br>
        Active <input type="radio" name="status" value="1"/> <br>
        Passive <input type="radio" name="status" value="0" checked/> <br>
        <button type="submit">Submit</button>
    </form>

@stop