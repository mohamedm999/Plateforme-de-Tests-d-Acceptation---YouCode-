@extends('layouts.candidate')

@section('title', 'Quiz Test')

@section('content')
<div class="container">
    <div class="card">
        <div class="text-white card-header bg-primary d-flex justify-content-between align-items-center">
            <h3>Quiz Test</h3>
            <div id="timer" class="p-2 badge bg-light text-dark">
                Time remaining: <span id="minutes">00</span>:<span id="seconds">00</span>
            </div>
        </div>
        
        <div class="card-body">
            @if(isset($quizz))
                <div class="mb-4">
                    <h4>{{ $quizz->title }}</h4>