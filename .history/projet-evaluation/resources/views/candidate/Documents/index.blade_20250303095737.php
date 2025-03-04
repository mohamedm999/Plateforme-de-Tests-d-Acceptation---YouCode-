<!-- resources/views/candidate/Documents/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Upload Documents</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="file">Choose File:</label>
                <input type="file" class="form-control-file" id="file" name="file" required>
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <h2>Uploaded Documents</h2>

        @if(count($documents) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>File</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documents as $document)
                        <tr>
                            <td>{{ $document->title }}</td>
                            <td><a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">View File</a></td>
                            <td>
                                <!-- Add any actions here, like delete or edit -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No documents uploaded yet.</p>
        @endif
    </div>
@endsection
