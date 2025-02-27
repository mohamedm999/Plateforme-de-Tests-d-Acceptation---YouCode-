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
                    <h5 class="card-title">Average Score</h5>
                    <h2 class="mb-0">{{ $stats['average_score'] ?? '0%' }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Tests -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Upcoming Tests</h5>
                </div>
                <div class="card-body">
                    @if(isset($upcomingTests) && count($upcomingTests) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Test Name</th>
                                        <th>Due Date</th>
                                        <th>Duration</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($upcomingTests as $test)
                                    <tr>
                                        <td>{{ $test->name }}</td>
                                        <td>{{ $test->due_date->format('M d, Y') }}</td>
                                        <td>{{ $test->duration }} minutes</td>
                                        <td>
                                            <a href="{{ route('candidate.tests.show', $test->id) }}" class="btn btn-primary btn-sm">Start Test</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <p class="mb-0">No upcoming tests at the moment.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Test Results -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Recent Test Results</h5>
                </div>
                <div class="card-body">
                    @if(isset($completedTests) && count($completedTests) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Test Name</th>
                                        <th>Completion Date</th>
                                        <th>Score</th>
                                        <th>Status</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($completedTests as $test)
                                    <tr>
                                        <td>{{ $test->name }}</td>
                                        <td>{{ $test->completed_at->format('M d, Y') }}</td>
