@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>All users</h1>
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
    <?php foreach($users as $user): ?>
        <tr>
             <td><?= $user->name?></td>
             <td><?= $user->email?></td>
             <td><?= $user->status? "active" : "passive" ?></td>
             <td>
                 <ul>
                     <?php foreach ($user as $news):?>
                     <?php endforeach;?>
                 </ul>

             </td>
{{--             <td>--}}
{{--                 <a href="/admin/users/create"><button>Change</button></a>--}}
{{--                 <a href="#"><button>Delete</button></a>--}}
{{--             </td>--}}
            <td>
                <a href="{{route('users.edit')}}" >
                    <button>Edit</button>
                </a>

                <a href="/admin/users/delete?id=1">
                    <button onclick="return confirm('are you sure?')" >
                       Delete
                    </button>
                </a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<?php echo $users->render(); ?>
@stop