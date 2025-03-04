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
                    <p>{{ $quizz->description }}</p>
                    <div class="alert alert-info">
                        <strong>Instructions:</strong> {{ $quizz->instructions ?? 'Answer all questions before submitting the quiz.' }}
                    </div>
                </div>

                <form id="quizForm" action="{{ route('candidate.quizz.submit', $quizz->id) }}" method="POST">
                    @csrf
                    
                    @if(isset($questions) && count($questions) > 0)
                        @foreach($questions as $index => $question)
                            <div class="p-3 mb-4 border rounded question-container" data-question="{{ $index + 1 }}">
                                <h5>Question {{ $index + 1 }}: {{ $question->content }}</h5>
                                
                                @if($question->type === 'multiple_choice')
                                    @foreach($question->options as $option)
                                        <div class="form-check">
                                            <input 
                                                class="form-check-input" 
                                                type="radio" 
                                                name="answers[{{ $question->id }}]" 
                                                id="option_{{ $question->id }}_{{ $option->id }}" 
                                                value="{{ $option->id }}"
                                            >
                                            <label class="form-check-label" for="option_{{ $question->id }}_{{ $option->id }}">
                                                {{ $option->content }}
                                            </label>
                                        </div>
                                    @endforeach
                                @elseif($question->type === 'checkbox')
                                    @foreach($question->options as $option)
                                        <div class="form-check">
                                            <input 
                                                class="form-check-input" 
                                                type="checkbox" 
                                                name="answers[{{ $question->id }}][]" 
                                                id="option_{{ $question->id }}_{{ $option->id }}" 
                                                value="{{ $option->id }}"
                                            >
                                            <label class="form-check-label" for="option_{{ $question->id }}_{{ $option->id }}">
                                                {{ $option->content }}
                                            </label>
                                        </div>
                                    @endforeach
                                @elseif($question->type === 'text')
                                    <div class="form-group">
                                        <textarea class="form-control" name="answers[{{ $question->id }}]" rows="3" placeholder="Type your answer here..."></textarea>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                        <div class="mt-4 d-flex justify-content-between">
                            <button type="button" id="prevBtn" class="btn btn-secondary">Previous</button>
                            <button type="button" id="nextBtn" class="btn btn-primary">Next</button>
                            <button type="submit" class="btn btn-success">Submit Quiz</button>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            No questions available for this quiz.
                        </div>
                    @endif
                </form>
            @else
                <div class="alert alert-danger">
                    Quiz not found or not available.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize quiz navigation
        const questionContainers = document.querySelectorAll('.question-container');
        let currentQuestion = 0;
        
        function showQuestion(index) {
            questionContainers.forEach((container, i) => {
                container.style.display = i === index ? 'block' : 'none';
            });
            
            document.getElementById('prevBtn').disabled = index === 0;
            document.getElementById('nextBtn').disabled = index === questionContainers.length - 1;
        }
        
        if (questionContainers.length > 0) {
            showQuestion(currentQuestion);
            
