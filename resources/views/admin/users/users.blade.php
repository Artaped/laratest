@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>All users</h1>
    <a href="{{route('users.create')}}">
        <button>Create News</button>
    </a>
@stop

@section('content')
    <table id="users" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>E-mail</th>
            <th>Status</th>
            <th>User News</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->status ? "active" : "passive" }} </td>
                <td>
                    <ul>
                        @foreach($user->news()->pluck('title') as $news)
                            <li>{{ $news }}</li>
                        @endforeach
                    </ul>

                </td>
                <td>
                    <a href="/admin/users/edit/{{ $user->id }}" >
                    <button>Edit</button>
                    </a>

                    <a href="/admin/users/delete/{{ $user->id }}">
                        <button onclick="return confirm('are you sure?')">
                            Delete
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->render() }}
@stop