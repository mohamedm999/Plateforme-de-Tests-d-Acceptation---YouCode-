<!-- filepath: resources/views/candidate/quizzes/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Available Quizzes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="px-4 py-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Welcome to the Quiz Section</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Here you can take quizzes to test your knowledge. Select a quiz below to begin.
                        </p>
                    </div>

                    <div class="space-y-4">
                        @foreach ($quizzes as $quiz)
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
                                            <a href="{{ route('candidate.quizzes.results', \App\Models\QuizAttempt::where('user_id', Auth::id())->where('quiz_id', $quiz->id)->whereNotNull('completed_at')->first()->id) }}"
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