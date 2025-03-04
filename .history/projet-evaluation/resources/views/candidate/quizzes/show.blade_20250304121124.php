<!-- filepath: /c:/github/Plateforme-de-Tests-d-Acceptation---YouCode-/projet-evaluation/resources/views/candidate/quizzes/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $quiz->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Quiz Information</h3>
                            <p class="mt-1 text-sm text-gray-600">{{ $quiz->description }}</p>
                        </div>

                        @if($quiz->time_limit)
                        <div class="p-3 bg-blue-100 rounded-md">
                            <div class="text-sm font-medium text-blue-800">Time Remaining:</div>
                            <div id="timer" class="text-xl font-bold text-blue-800" data-seconds="{{ $attempt->remaining_time }}">
                                {{ floor($attempt->remaining_time / 60) }}:{{ str_pad($attempt->remaining_time % 60, 2, '0', STR_PAD_LEFT) }}
                            </div>
                        </div>
                        @endif
                    </div>

                    <form id="quiz-form" method="POST" action="{{ route('candidate.quizzes.submit', $quiz->id) }}">
                        @csrf

                        <div class="space-y-8">
                            @foreach($quiz->questions as $index => $question)
                            <div class="p-5 border rounded-lg bg-gray-50">
                                <div class="mb-4">
                                    <h4 class="text-lg font-medium text-gray-900">Question {{ $index + 1 }}: {{ $question->question_text }}</h4>
                                    @if($question->question_type == 'multiple')
                                        <p class="mt-1 text-sm text-blue-600">Select all that apply</p>
                                    @else
                                        <p class="mt-1 text-sm text-blue-600">Select one answer</p>
                                    @endif
                                </div>

                                <div class="space-y-3">
                                    @foreach($question->options as $option)
                                    <div class="flex items-center">
                                        @if($question->question_type == 'multiple')
                                        <input type="checkbox"
                                               name="question_{{ $question->id }}[]"
                                               id="option_{{ $option->id }}"
                                               value="{{ $option->id }}"
                                               class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                        @else
                                        <input type="radio"
                                               name="question_{{ $question->id }}"
                                               id="option_{{ $option->id }}"
                                               value="{{ $option->id }}"
                                               class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                        @endif
                                        <label for="option_{{ $option->id }}" class="block ml-3 text-sm font-medium text-gray-700">
                                            {{ $option->option_text }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="flex justify-center mt-8">
                            <button type="submit" class="px-6 py-3 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Submit Quiz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if($quiz->time_limit)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const timerElement = document.getElementById('timer');
            let remainingSeconds = parseInt(timerElement.dataset.seconds);

            const timer = setInterval(function() {
                remainingSeconds--;

                if (remainingSeconds <= 0) {
                    clearInterval(timer);
                    document.getElementById('quiz-form').submit();
                    return;
                }

                const minutes = Math.floor(remainingSeconds / 60);
                const seconds = remainingSeconds % 60;
                timerElement.textContent = minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

                // Visual warning when time is running out
                if (remainingSeconds < 60) {
                    timerElement.classList.add('text-red-600');
                    timerElement.classList.add('animate-pulse');
                }
            }, 1000);
        });
    </script>
    @endif
</x-app-layout>
