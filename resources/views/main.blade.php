@extends('layouts.app')

@section('content')
    <div class="row">
            <button style="margin-left: 40px"><a href="{{ route('page.create.news') }}">Create News</a></button>
    </div>
    @include('messages.status')
<div class="row">
    <div class="col-12" style="text-align:  center;">
        <h3>News: </h3>
        <table id="news" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($newses as $news)
                <tr>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->status? "active":"passive" }}</td>
                    <td>
                        <a href="/main/edit/{{ $news->id }}" >
                            <button>Edit</button>
                        </a>

                        <a href="/main/delete/{{ $news->id }}">
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
</div>
@endsection