@extends('layouts.app')
@section('title', 'Create New Note')

@section('content')
    <div class="container">
        <h1 class="text-center"><u>Create New Note</u></h1>
        <form action="{{ route('create.note') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Note Title:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    id="exampleFormControlInput1" placeholder="Enter the Title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Note Content:</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="exampleFormControlTextarea1"
                    rows="3" placeholder="Enter the note content"></textarea>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">File upload:</label>
                <input class="form-control @error('file') is-invalid @enderror" name="file" type="file"
                    id="formFile">
                @error('file')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <input type="submit" value="Create" class="btn btn-primary">
            <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
        </form>
    </div>
@endsection
