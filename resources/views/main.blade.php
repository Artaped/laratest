@extends('layouts.app')

@section('content')
    <div class="row">
        <ul>
            <li><a href="{{ route('page.create.news') }}">Create News</a></li>
        </ul>
    </div>
    @include('messages.status')
<div class="row">
    <div class="col-6" style=""align="center">
        <h3>News: </h3>
        <table id="news" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($newses as $news)
                <tr>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->status? "active":"passive" }}</td>
                    <td>
                        <a href="/admin/news/edit/{{ $news->id }}" >
                            <button>Edit</button>
                        </a>

                        <a href="/admin/news/delete/{{ $news->id }}">
                            <button onclick="return confirm('are you sure?')" >
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-6" style=""align="center">
        <h3>Users</h3>
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
    </div>
</div>
@endsection