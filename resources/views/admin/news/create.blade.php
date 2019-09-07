@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add News</h1>
@stop

@section('content')
    <form action="/admin/news/store" method="post">
        {{ csrf_field() }}
        Title <br>
        <input type="text" name="title" <?=$_POST['title']?? ''?>><br>
        Authors <br>
        <label for='formAuthors[]'>Select Authors:</label><br>
        <select multiple="multiple" name="formAuthors[]">
            <?php foreach ($users as $user): ?>
                <option value="<?=$user->name?>"><?=$user->name?></option>
            <? endforeach;?>
        </select><br>
        Text <br>
        <textarea name="text"  id="" cols="30" rows="10"><?=$_POST['text']?? ''?></textarea><br>
        Status <br>
        <input type="radio" name="status" value="1"/><br>
        <button type="submit">Submit</button>
    </form>

@stop