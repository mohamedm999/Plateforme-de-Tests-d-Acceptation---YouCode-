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
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-gray-700">{{ $attempt->quiz->questions->count() }} Questions</span>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <h3 class="text-xl font-bold text-gray-800">Attempt Details</h3>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-gray-700">Duration: {{ $attempt->started_at->diffInMinutes($attempt->completed_at) }} minutes</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="text-gray-700">Completed: {{ $attempt->completed_at->format('M d, Y H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Question Review -->
                    <div class="mt-12">
                        <h3 class="mb-6 text-xl font-bold text-gray-800">Question Review</h3>

                        @php
                            $questions = $attempt->quiz->questions;
                            $userAnswers = $attempt->userAnswers->groupBy('question_id');
                            $correctCount = 0;
                        @endphp

                        <div class="space-y-6">
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
                                    
                                    if ($isCorrect) $correctCount++;
                                @endphp

                                <div class="overflow-hidden transition-shadow duration-300 bg-white border rounded-xl hover:shadow-lg 
                                    {{ $isCorrect ? 'border-green-200' : 'border-red-200' }}">
                                    <div class="p-5">
                                        <div class="flex items-center justify-between mb-4">
                                            <div class="flex items-center">
                                                <span class="flex items-center justify-center w-8 h-8 mr-3 {{ $isCorrect ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} rounded-full">
                                                    {{ $index + 1 }}
                                                </span>
                                                <h4 class="text-lg font-semibold text-gray-800">{{ $question->question_text }}</h4>
                                            </div>
                                            <span class="px-3 py-1 text-sm font-medium rounded-full {{ $isCorrect ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                                {{ $isCorrect ? 'Correct' : 'Incorrect' }}
                                            </span>
                                        </div>

                                        <div class="space-y-3 ml-11">
                                            @foreach($question->options as $option)
                                                @php
                                                    $isSelected = in_array($option->id, $selectedOptionIds);
                                                @endphp
                                                <div class="flex items-center p-3 {{ 
                                                    $isSelected && $option->is_correct ? 'bg-green-50 border-l-4 border-green-400' : 
                                                    ($isSelected && !$option->is_correct ? 'bg-red-50 border-l-4 border-red-400' : 
                                                    ($option->is_correct ? 'bg-green-50 border-l-4 border-green-400' : 'bg-gray-50 border-l-4 border-gray-200')) 
                                                }} rounded-r-md">
                                                    @if($isSelected)
                                                        <svg class="w-5 h-5 mr-3 {{ $option->is_correct ? 'text-green-500' : 'text-red-500' }}" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="{{ $option->is_correct ? 'M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z' : 'M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z' }}" clip-rule="evenodd"></path>
                                                        </svg>
                                                    @elseif($option->is_correct)
                                                        <svg class="w-5 h-5 mr-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
