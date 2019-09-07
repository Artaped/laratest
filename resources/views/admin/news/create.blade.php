@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add News</h1>
@stop

@section('content')
    <form action="#" method="post">
        Title <br>
        <input type="text"><br>
        Authors <br>
        <label for='formAuthors[]'>Select the Authors:</label><br>
        <select multiple="multiple" name="formAuthors[]">
            <option value="Vasia">Vasia</option>
            <option value="Petia">Petia</option>
            <option value="France">France</option>
            <option value="Mexico">Mexico</option>
            <option value="Russia">Russia</option>
            <option value="Japan">Japan</option>
            <option value="Vasia">Vasia</option>
            <option value="Petia">Petia</option>
            <option value="France">France</option>
            <option value="Mexico">Mexico</option>
            <option value="Russia">Russia</option>
            <option value="Japan">Japan</option>
        </select><br>
        Text <br>
        <textarea name="text" id="" cols="30" rows="10"></textarea><br>
        Status <br>
        <input type="radio" name="status" value="1"/><br>
        <button>Submit</button>
    </form>

@stop