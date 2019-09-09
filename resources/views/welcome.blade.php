<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            left: 50px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        img {
            margin-top: 100px;
        }
        a{
            border: 2px solid #e34761;
            border-radius: 10px
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="top-right links">
        <b> If you want create and edit news click  --></b>
        <a href="{{ route('main') }}">News</a>
    </div>

    <div class="content">
        <img src="{{ asset('img/67541170_2653675371332385_1024664345105137664_n.jpg') }}" alt="" width="900"
             height="500">
    </div>
</div>
</body>
</html>
