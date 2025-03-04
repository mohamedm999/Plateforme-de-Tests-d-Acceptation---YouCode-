<!-- filepath: resources/views/candidate/quizzes/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Available Quizzes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="px-4 py-3 mb-6 text-green-700 bg-green-100 border-l-4 border-green-500 rounded-md shadow dark:bg-green-800/30 dark:text-green-300" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">{{ session('success') }}</div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="px-4 py-3 mb-6 text-red-700 bg-red-100 border-l-4 border-red-500 rounded-md shadow dark:bg-red-800/30 dark:text-red-300" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">{{ session('error') }}</div>
                    </div>
                            <div class="p-5 transition-shadow border rounded-md shadow-sm hover:shadow-md bg-gray-50">
                                <div class="flex justify-between">
                                    <div>
                                        <h4 class="text-lg font-medium text-gray-900">{{ $quiz->title }}</h4>
                                        <p class="mt-1 text-sm text-gray-600">{{ $quiz->description }}</p>
                                        <div class="mt-2 space-x-4">
                                            <span class="text-xs text-gray-500">
                                                <strong>Questions:</strong> {{ $quiz->questions->count() }}
                                            </span>
                                            <span class="text-xs text-gray-500">
                                                <strong>Time Limit:</strong> {{ $quiz->time_limit ? $quiz->time_limit . ' minutes' : 'No limit' }}
                                            </span>
                                            <span class="text-xs text-gray-500">
                                                <strong>Passing Score:</strong> {{ $quiz->passing_score }}%
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        @if (in_array($quiz->id, $attemptedQuizzes))
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Completed
                                            </span>
                                            <a href="{{ route('quizzes.results', \App\Models\QuizAttempt::where('user_id', Auth::id())->where('quiz_id', $quiz->id)->whereNotNull('completed_at')->first()->id) }}"
                                                class="block px-4 py-2 mt-2 text-sm text-center text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                                View Results
                                            </a>
                                        @else
                                        <a href="{{ route('quizzes.show', $quiz->id) }}" class="block px-4 py-2 text-sm text-center text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                            Start Quiz
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ($quizzes->isEmpty())
                            <div class="p-4 rounded-md bg-gray-50">
                                <p class="text-gray-700">No quizzes are currently available.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>