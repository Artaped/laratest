@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>All news</h1>
    <a href="{{route('news.create')}}" >
        <button>Create News</button>
    </a>
@stop

@section('content')
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
    {{ $newses->render() }}
@stop
