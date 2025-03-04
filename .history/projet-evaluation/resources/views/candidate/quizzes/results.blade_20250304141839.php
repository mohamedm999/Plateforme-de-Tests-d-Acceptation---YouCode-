<!-- filepath: /c:/github/Plateforme-de-Tests-d-Acceptation---YouCode-/projet-evaluation/resources/views/candidate/quizzes/results.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Quiz Results: {{ $attempt->quiz->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="px-4 py-3 mb-6 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('info'))
                        <div class="px-4 py-3 mb-6 text-blue-700 bg-blue-100 border border-blue-400 rounded" role="alert">
                            {{ session('info') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div class="p-4 border rounded-lg bg-gray-50">
                            <h3 class="text-lg font-medium text-gray-900">Score</h3>
                            <div class="flex items-center justify-center mt-2">
                                <div class="text-4xl font-bold {{ $attempt->isPassed() ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $attempt->score }}%
                                </div>
                            </div>
                            <div class="mt-2 text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $attempt->isPassed() ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $attempt->isPassed() ? 'Passed' : 'Failed' }}
                                </span>
                            </div>
                        </div>

                        <div class="p-4 border rounded-lg bg-gray-50">
                            <h3 class="text-lg font-medium text-gray-900">Quiz Details</h3>
                            <div class="mt-2 text-sm text-gray-600">
                                <div><strong>Title:</strong> {{ $attempt->quiz->title }}</div>
                                <div><strong>Passing Score:</strong> {{ $attempt->quiz->passing_score }}%</div>
                                <div><strong>Questions:</strong> {{ $attempt->quiz->questions->count() }}</div>
                            </div>
                        </div>

                        <div class="p-4 border rounded-lg bg-gray-50">
                            <h3 class="text-lg font-medium text-gray-900">Attempt Details</h3>
                            <div class="mt-2 text-sm text-gray-600">
                                <div><strong>Started:</strong> {{ $attempt->started_at->format('M d, Y H:i') }}</div>
                                <div><strong>Completed:</strong> {{ $attempt->completed_at->format('M d, Y H:i') }}</div>
                                <div><strong>Duration:</strong> {{ $attempt->started_at->diffInMinutes($attempt->completed_at) }} minutes</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="mb-4 text-lg font-medium text-gray-900">Question Review</h3>

                        <div class="space-y-6">
                            @php
                                $questions = $attempt->quiz->questions;
                                $userAnswers = $attempt->userAnswers->groupBy('question_id');
                            @endphp

                            @foreach($questions as $index => $question)
                                @php
                                    $questionAnswers = isset($userAnswers[$question->id]) ? $userAnswers[$question->id] : collect();
                                    $selectedOptionIds = $questionAnswers->pluck('option_id')->toArray();
                                    $isCorrect = true;

                                    // For single-choice questions
                                    if ($question->question_type === 'single') {
                                        $isCorrect = $questionAnswers->contains('is_correct', true) && $questionAnswers->count() === 1;
                                    }
                                    // For multiple-choice questions
                                    else {
                                        $correctOptionIds = $question->options()->where('is_correct', true)->pluck('id')->toArray();
                                        $isCorrect = count($selectedOptionIds) === count($correctOptionIds) &&
                                                     empty(array_diff($selectedOptionIds, $correctOptionIds));
                                    }
                                @endphp

                                <div class="p-5 border rounded-lg {{ $isCorrect ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200' }}">
                                    <div class="mb-3">
                                        <h4 class="text-lg font-medium {{ $isCorrect ? 'text-green-800' : 'text-red-800' }}">
                                            Question {{ $index + 1 }}: {{ $question->question_text }}
                                        </h4>
                                        <div class="mt-1 text-sm {{ $isCorrect ? 'text-green-700' : 'text-red-700' }}">
                                            {{ $isCorrect ? 'Correct' : 'Incorrect' }}
                                            ({{ $question->points }} points)
                                        </div>
                                    </div>

                                    <div class="space-y-2">
                                        @foreach($question->options as $option)
                                            @php
                                                $isSelected = in_array($option->id, $selectedOptionIds);
                                            @endphp
                                            <div class="flex items-center">
                                                <span class="inline-flex items-center justify-center w-5 h-5 mr-2 {{
                                                    $option->is_correct && $isSelected ? 'bg-green-500 text-white' :
                                                    (!$option->is_correct && $isSelected ? 'bg-red-500 text-white' :
                                                    ($option->is_correct ? 'bg-green-200 text-green-800' : 'bg-gray-200 text-gray-800'))
                                                }} rounded-full text-xs font-bold">
                                                    @if($isSelected)
                                                        @if($option->is_correct)
                                                            ✓
                                                        @else
                                                            ✗
                                                        @endif
                                                    @elseif($option->is_correct)
                                                        !
                                                    @endif
                                                </span>
                                                <span class="{{
                                                    $isSelected ? 'font-medium ' .
                                                    ($option->is_correct ? 'text-green-800' : 'text-red-800') :
                                                    ($option->is_correct ? 'font-medium text-green-800' : 'text-gray-600')
                                                }}">
                                                    {{ $option->option_text }}
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>

                                    @if($question->explanation)
                                        <div class="p-3 mt-3 text-sm text-gray-800 bg-gray-100 rounded">
                                            <span class="font-medium">Explanation:</span> {{ $question->explanation }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-center mt-8">
                        <a href="{{ route('quizzes.index') }}" class="px-6 py-3 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Return to Quizzes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>