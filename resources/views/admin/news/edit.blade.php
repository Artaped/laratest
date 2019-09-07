@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add News</h1>
@stop

@section('content')

    <form action="/admin/news/edit/<?=$news->id?>" method="post">
        {{ csrf_field() }}
        Title <br>
        <input type="text" name="title" value="<?=$news->title?>"><br>
        Authors <br>
        <label for='formAuthors[]'>Select the Authors:</label><br>
        <select multiple="multiple" name="formAuthors[]">
            <?php foreach ($users as $user): ?>
            <option value="<?=$user->name?>"><?=$user->name?></option>
            <? endforeach;?>
        </select><br>
        Text <br>
        <textarea name="text"  id="" cols="30" rows="10"><?=$news->text?></textarea><br>
        Status <br>
        <input type="radio" name="status" value="1"/><br>
        <button type="submit">Submit</button>
    </form>

@stop