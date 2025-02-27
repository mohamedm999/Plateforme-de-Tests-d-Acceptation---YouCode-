
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
