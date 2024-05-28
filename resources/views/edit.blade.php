@extends('layouts.app')
@section('title', 'Edit Note')

@section('content')
    <div class="container">
        <h1 class="text-center"><u>Edit Note</u></h1>
        <form action="{{ route('update.note', $note->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Note Title:</label>
                <input type="text" class="form-control" value="{{ $note->title }}" name="title" id="title"
                    placeholder="Enter the Title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Note Content:</label>
                <input type="text" class="form-control" name="content" id="content" value="{{ $note->content }}"
                    placeholder="Enter the note content">
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">File upload:</label>
                <input class="form-control" name="file" value="{{ $note->file }}" type="file" id="formFile">
                @error('file')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <img src="{{ asset($note->file) }}" alt="img" width="70px">
            </div>

            <input type="submit" value="Update" class="btn btn-primary">
            <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
        </form>
    </div>
@endsection
