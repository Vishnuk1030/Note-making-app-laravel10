@extends('layouts.app')
@section('title','View Note')

@section('content')
    <div class="container">
        <h1 class="text-center"><u>View Note</u></h1>
        <br>
        <h5 class="text-center">Note Title: {{ $view->title }}</h5>
        <h5 class="text-center">Note content: {{ $view->content }}</h5>
        <h5 class="text-center">Image: <br> <img src="{{ asset($view->file) }}" width="200px" height="200px"></h5>

        <div class="text-center">
            <a href="{{ route('home') }}" class="btn btn-danger">Back</a>

        </div>
        <div>
        @endsection
