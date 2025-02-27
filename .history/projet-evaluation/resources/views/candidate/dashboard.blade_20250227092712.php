@extends('layouts.app')

@section('title', 'Candidate Dashboard')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="my-1">Candidate Dashboard</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <img src="{{ Auth::user()->profile_photo ?? asset('images/default-avatar.png') }}" 
                                             alt="Profile Photo" class="rounded-circle img-fluid" style="width: 100px;">
                                    </div>
                                    <h5 class="card-title">{{ Auth::user()->name }}</h5>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                    <a href="{{ route('candidate.profile') }}" class="btn btn-outline-primary">Edit Profile</a>
                                </div>
                            </div>
                            
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Quick Links</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('candidate.tests.available') }}">
                                                <i class="fas fa-clipboard-list me-2"></i> Available Tests
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('candidate.tests.completed') }}">
                                                <i class="fas fa-check-circle me-2"></i> Completed Tests
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('candidate.results') }}">
                                                <i class="fas fa-chart-bar me-2"></i> View Results
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Upcoming Tests</h5>
                                </div>
                                <div class="card-body">
                                    @if(isset($upcomingTests) && count($upcomingTests) > 0)
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Test Name</th>
                                                        <th>Start Date</th>
                                                        <th>Duration</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($upcomingTests as $test)
                                                        <tr>
                                                            <td>{{ $test->name }}</td>
                                                            <td>{{ $test->start_date->format('d M Y, H:i') }}</td>
                                                            <td>{{ $test->duration }} minutes</td>
                                                            <td>
