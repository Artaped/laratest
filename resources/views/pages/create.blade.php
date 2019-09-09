@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{ route('page.store.news') }}" method="post">
                        {{ csrf_field() }}
                        Title <br>
                        <label>
                            <input type="text" name="title" value="{{old('name')}}" required>
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
                        <label for=""></label><textarea name="text" id="" cols="50" rows="10"  required></textarea><br>
                        Status <br>
                        Active <label>
                            <input type="radio" name="status" value="1"/>
                        </label>
                        Passive <label>
                            <input type="radio" name="status" value="0" checked/>
                        </label> <br>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
