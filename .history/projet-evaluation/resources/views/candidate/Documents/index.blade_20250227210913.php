@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">My Documents</h4>
                    <a href="{{ route('candidate.documents.create') }}" class="btn btn-sm btn-light">
                        <i class="fas fa-plus"></i> Upload New Document
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(count($documents) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Document Name</th>
                                        <th>Type</th>
                                        <th>Uploaded On</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($documents as $document)
                                        <tr>
                                            <td>{{ $document->name }}</td>
                                            <td>{{ $document->type }}</td>
                                            <td>{{ $document->created_at->format('d M Y') }}</td>
                                            <td>
                                                @if($document->is_verified)
                                                    <span class="badge bg-success">Verified</span>
                                                @else
                                                    <span class="badge bg-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('candidate.documents.show', $document->id) }}" class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('candidate.documents.download', $document->id) }}" class="btn btn-sm btn-secondary">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                    <form action="{{ route('candidate.documents.destroy', $document->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this document?')">
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
                        
                        <div class="d-flex justify-content-center mt-4">
                            {{ $documents->links() }}
                        </div>
                    @else
                        <div class="text-center py-4">
                            <img src="{{ asset('images/no-documents.svg') }}" alt="No Documents" class="img-fluid mb-3" style="max-height: 150px;">
                            <h5>No Documents Found</h5>
                            <p class="text-muted">You haven't uploaded any documents yet.</p>
                            <a href="{{ route('candidate.documents.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus"></i> Upload Your First Document
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
