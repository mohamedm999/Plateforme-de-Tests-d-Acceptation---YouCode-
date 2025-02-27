
@extends('layouts.candidate')

@section('title', 'My Documents')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">My Documents</h1>
        <a href="{{ route('candidate.documents.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Upload New Document
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            @if($documents->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Size</th>
                                <th>Uploaded</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents as $document)
                                <tr>
                                    <td>
                                        <i class="far 
                                        @if(in_array(pathinfo($document->filename, PATHINFO_EXTENSION), ['pdf']))
                                            fa-file-pdf
                                        @elseif(in_array(pathinfo($document->filename, PATHINFO_EXTENSION), ['doc', 'docx']))
                                            fa-file-word
                                        @elseif(in_array(pathinfo($document->filename, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                            fa-file-image
                                        @else
                                            fa-file-alt
                                        @endif
                                        text-secondary me-2"></i>
                                        {{ strtoupper(pathinfo($document->filename, PATHINFO_EXTENSION)) }}
                                    </td>
                                    <td>{{ $document->title }}</td>
                                    <td>{{ $document->human_readable_size }}</td>
                                    <td>{{ $document->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('candidate.documents.show', $document) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('candidate.documents.download', $document) }}" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <form action="{{ route('candidate.documents.destroy', $document) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this document?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-4">
                    {{ $documents->links() }}
                </div>
            @else
                <div class="text-center py-4">
                    <i class="far fa-folder-open fa-4x text-muted mb-3"></i>
                    <h5>No documents found</h5>
                    <p class="text-muted">You haven't uploaded any documents yet.</p>
                    <a href="{{ route('candidate.documents.create') }}" class="btn btn-primary mt-2">
                        <i class="fas fa-upload me-1"></i> Upload Your First Document
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
