<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="text-2xl font-bold text-indigo-800">
                Quiz Results: {{ $attempt->quiz->title }}
            </h2>
            <span class="inline-flex mt-2 md:mt-0 items-center px-3 py-1.5 rounded-full text-sm font-medium {{ $attempt->isPassed() ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $attempt->isPassed() ? 'Passed' : 'Failed' }}
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-6 overflow-hidden bg-white shadow-xl rounded-xl">
                <div class="p-6 bg-white lg:p-8">
                    @if (session('success'))
                        <div class="px-4 py-3 mb-6 text-green-700 bg-green-100 border-l-4 border-green-500 rounded-md" role="alert">
                            <p class="font-medium">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if (session('info'))
                        <div class="px-4 py-3 mb-6 text-blue-700 bg-blue-100 border-l-4 border-blue-500 rounded-md" role="alert">
                            <p class="font-medium">{{ session('info') }}</p>
                        </div>
                    @endif

                    <!-- Score Summary -->
                    <div class="p-6 mb-8 shadow-sm bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl">
                        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                            <div class="flex flex-col items-center justify-center">
                                <div class="relative">
                                    <svg class="w-32 h-32" viewBox="0 0 36 36">
                                        <circle cx="18" cy="18" r="16" fill="none" stroke="#e6e6e6" stroke-width="2"></circle>
                                        <circle cx="18" cy="18" r="16" fill="none" stroke="{{ $attempt->isPassed() ? '#10B981' : '#EF4444' }}" stroke-width="2" 
                                            stroke-dasharray="{{ 100 * 3.14 * 16 / 100 }}" stroke-dashoffset="{{ (100 - $attempt->score) * 3.14 * 16 / 100 }}"
                                            transform="rotate(-90 18 18)"></circle>
                                        <text x="18" y="18.5" text-anchor="middle" alignment-baseline="middle" 
                                            fill="{{ $attempt->isPassed() ? '#10B981' : '#EF4444' }}" font-size="8.5" font-weight="bold">
                                            {{ $attempt->score }}%
                                        </text>
                                    </svg>
                                </div>
                                <div class="mt-4 text-center">
                                    <h3 class="text-xl font-bold text-gray-800">Your Score</h3>
                                    <p class="text-gray-600">Passing score: {{ $attempt->quiz->passing_score }}%</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <h3 class="text-xl font-bold text-gray-800">Quiz Details</h3>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <span class="text-gray-700">{{ $attempt->quiz->title }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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