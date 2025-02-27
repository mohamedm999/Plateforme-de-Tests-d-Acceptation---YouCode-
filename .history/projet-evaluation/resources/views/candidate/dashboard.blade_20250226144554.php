@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1 class="fw-bold">Candidate Dashboard</h1>
            <p class="text-muted">Welcome back, {{ Auth::user()->name }}</p>
        </div>
    </div>

    <div class="row">
        <!-- Stats Cards -->
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Tests Assigned</h5>
                    <h2 class="mb-0">{{ $stats['assigned'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Tests Completed</h5>
                    <h2 class="mb-0">{{ $stats['completed'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
