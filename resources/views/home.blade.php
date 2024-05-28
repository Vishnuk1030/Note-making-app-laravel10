@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Dashboard</h1>
                    </div>

                    <div class="card-body">
                        {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show color col-md-12" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <a href="{{ route('create.note') }}" class="btn btn-primary">Create Note</a>
                        <table class="table table-bordered table-striped mt-4">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Note Title</th>
                                    <th scope="col">Note Content</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($notes->count() > 0)
                                    @foreach ($notes as $note)
                                        <tr class="text-center">
                                            <th scope="row">{{ $note->id }}</th>
                                            <td><img src="{{ asset($note->file) }}" alt="img" height="70px"
                                                    width="70px"></td>
                                            <td>{{ $note->title }}</td>
                                            <td>{{ $note->content }}</td>
                                            <td>
                                                <a href="{{ route('view.note', encrypt($note->id)) }}"
                                                    class="btn btn-warning">view</a>

                                                <a href="{{ route('edit.note', encrypt($note->id)) }}"
                                                    class="btn btn-success">edit</a>

                                                <a href="{{ route('delete.note', $note->id) }}" class="btn btn-danger"
                                                    onclick="return confirm('Are you want to delete?');">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">
                                            <h3 class="text-danger text-center">No Note is found</h3>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
