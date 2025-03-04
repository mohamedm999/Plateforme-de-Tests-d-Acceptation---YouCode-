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
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-xl rounded-xl dark:bg-gray-800">
                <div class="p-8">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Welcome to the Quiz Section</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">
                            Here you can take quizzes to test your knowledge. Select a quiz below to begin.
                        </p>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        @forelse ($quizzes as $quiz)
                            <div class="overflow-hidden transition-all duration-300 bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl dark:bg-gray-700 dark:border-gray-600">
                                <div class="p-6">
                                    <div class="flex flex-col h-full">
                                        <div>
                                            <div class="flex items-center justify-between">
                                                <h4 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $quiz->title }}</h4>
                                                @if (in_array($quiz->id, $attemptedQuizzes))
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-800/30 dark:text-green-300">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        Completed
                                                    </span>
                                                @endif
                                            </div>
                                            <p class="mt-3 text-gray-600 dark:text-gray-300">{{ $quiz->description }}</p>
                                        </div>
                                        
                                        <div class="grid grid-cols-3 gap-4 mt-6 mb-6">
                                            <div class="p-3 text-center bg-gray-100 rounded-lg dark:bg-gray-600">
                                                <span class="block text-2xl font-bold text-gray-700 dark:text-gray-100">{{ $quiz->questions->count() }}</span>
                                                <span class="text-xs text-gray-500 dark:text-gray-400">Questions</span>
                                            </div>
                                            <div class="p-3 text-center bg-gray-100 rounded-lg dark:bg-gray-600">
                                                <span class="block text-2xl font-bold text-gray-700 dark:text-gray-100">{{ $quiz->time_limit ?: '∞' }}</span>
                                                <span class="text-xs text-gray-500 dark:text-gray-400">Minutes</span>
                                            </div>
                                            <div class="p-3 text-center bg-gray-100 rounded-lg dark:bg-gray-600">
                                                <span class="block text-2xl font-bold text-gray-700 dark:text-gray-100">{{ $quiz->passing_score }}</span>
                                                <span class="text-xs text-gray-500 dark:text-gray-400">Pass %</span>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-auto">
                                            @if (in_array($quiz->id, $attemptedQuizzes))
                                                <a href="{{ route('quizzes.results', \App\Models\QuizAttempt::where('user_id', Auth::id())->where('quiz_id', $quiz->id)->whereNotNull('completed_at')->first()->id) }}"
