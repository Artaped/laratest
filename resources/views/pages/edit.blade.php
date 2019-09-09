@extends('layouts.app')

@section('content')
    @include('messages.status')
    <form action="/main/edit/{{ $news->id }}" method="post">
        {{ csrf_field() }}
        Title <br>
        <input type="text" name="title" value="{{ $news->title }}" required><br>
        Authors <br>
        <label for='users[]'>Select the Authors:</label><br>
        <select multiple="multiple" name="users[]">
            @foreach($users as  $user)
                @if($user->admin != 1)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        </select><br>
        Text <br>
        <textarea name="text"  id="" cols="30" rows="10" required>{{ $news->text }}</textarea><br>
        Status :{{ $news->status ? "Active" : "Passive" }} <br>
        Active <input type="radio" name="status" value="1"><br>
        Passive <input type="radio" name="status" value="0" checked><br>
        <button type="submit">Submit</button>
    </form>
@endsection
