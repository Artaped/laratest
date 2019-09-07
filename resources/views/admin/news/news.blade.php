@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>All news</h1>
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
        <tr>
            <td>Vasia</td>
            <td>Admin</td>
{{--            <td>--}}
{{--                <a href="#"><button>Change</button></a>--}}
{{--                <a href="#"><button>Delete</button></a>--}}
{{--            </td>--}}
            <td>
                <a href="{{route('news.edit')}}" >
                    <button>Edit</button>
                </a>

                <a href="/admin/news/delete?id=1">
                    <button onclick="return confirm('are you sure?')" >
                        Delete
                    </button>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
@stop
