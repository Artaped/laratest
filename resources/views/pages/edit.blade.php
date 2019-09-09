@extends('layouts.app')

@section('content')
    @include('messages.status')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form action="/main/edit/{{ $news->id }}" method="post">
                        {{ csrf_field() }}
                        Title:<br>
                        <label>
                            <input type="text" name="title" value="{{ $news->title }}" required>
                        </label><br>
                        Authors <br>
                        <label for='users[]'>Select the Authors:</label><br>
                        <label>
                            <select multiple="multiple" name="users[]">
                                @foreach($users as  $user)
                                    @if($user->admin != 1)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </label><br>
                        Text <br>
                        <label for=""></label><textarea name="text" id="" cols="30" rows="10"
                                                        required>{{ $news->text }}</textarea><br>
                        Status :{{ $news->status ? "Active" : "Passive" }} <br>
                        Active <label>
                            <input type="radio" name="status" value="1">
                        </label><br>
                        Passive <label>
                            <input type="radio" name="status" value="0" checked>
                        </label><br>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
