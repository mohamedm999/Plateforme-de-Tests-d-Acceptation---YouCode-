@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Documents</h1>

        <a href="{{ route('candidate.documents.create') }}" class="btn btn-primary">Add New Document</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documents as $document)
                    <tr>
                        <td>{{ $document->title }}</td>
                        <td>{{ $document->description }}</td>
                        <td><a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">View File</a></td>
                        <td>
                            <a href="{{ route('candidate.documents.edit', $document->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('candidate.documents.destroy', $document->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this document?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
