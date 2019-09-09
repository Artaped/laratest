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
        <label>
            <input type="text" name="title" required>
        </label><br>
        Authors <br>
        <label for='users[]'>Select Authors:</label><br>
        <label>
            <select multiple="multiple" name="users[]">
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{ $user->name }}</option>
                @endforeach
            </select>
        </label><br>
        Text <br>
        <label for=""></label><textarea name="text" id="" cols="30" rows="10" required></textarea><br>
        Status <br>
        Active <label>
            <input type="radio" name="status" value="1"/>
        </label> <br>
        Passive <label>
            <input type="radio" name="status" value="0" checked/>
        </label> <br>
        <button type="submit">Submit</button>
    </form>

@stop