<
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Admin Dashboard</h1>
@stop

@section('content')
    @include('messages.status')
    <img src="{{ asset('img/adm.jpg') }}" alt="">
@stop