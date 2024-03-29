@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>All users</h1>
@stop

@section('content')

    @include('messages.status')
    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            Name <br>
        <label>
            <input type="text" name="name" required value="{{old('name')}}">
        </label><br>
            E-mail <br>
        <label>
            <input type="text" name="email" required value="{{old('email')}}">
        </label><br>
            Password <br>
        <label for="password"></label><input type="password" name="password" id="password" required><br>
            Confirm Password <br>
        <label for="password_confirmation"></label><input type="password" name="password_confirmation" id="password_confirmation" required><br>
        Status <br>
            Active User
        <label>
            <input type="radio" name="status" value="1">
        </label><br>
            Passive User
        <label>
            <input type="radio" name="status" value="0" checked>
        </label><br>
            Аватар
        <input type="file" id="file" name="avatar"/>
        <div id="output"></div>
        <button type="submit">Submit</button>
    </form>
    <script>
        //js code for image preview
        function handleFileSelect(evt) {
            var file = evt.target.files; // FileList object
            var f = file[0];
            // Only process image files.
            if (!f.type.match('image.*')) {
                alert("Image only please....");
            }
            var reader = new FileReader();
            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {
                    // Render thumbnail.
                    var span = document.createElement('div');
                    span.innerHTML = ['<img  title="', escape(theFile.name), '" src="', e.target.result, '" width="60" height="60"/>'].join('');
                    document.getElementById('output').insertBefore(span, null);
                };
            })(f);
            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }

        document.getElementById('file').addEventListener('change', handleFileSelect, false);
    </script>
@stop