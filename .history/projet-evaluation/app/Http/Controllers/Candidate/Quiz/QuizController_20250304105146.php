<?php

namespace App\Http\Controllers\Candidate\Quizzes;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::where('is_active', true)->get();
        $attemptedQuizzes = QuizAttempt::where('user_id', Auth::id())
            ->whereNotNull('completed_at')
            ->pluck('quiz_id')
            ->toArray();

        return view('candidate.quizzes.index', compact('quizzes', 'attemptedQuizzes'));
    }

    public function show($id)
    {
        $quiz = Quiz::with('questions.options')->findOrFail($id);

        // Check if the user has already completed this quiz
        $previousAttempt = QuizAttempt::where('user_id', Auth::id())
            ->where('quiz_id', $id)
            ->whereNotNull('completed_at')
            ->first();

        if ($previousAttempt) {
            return redirect()->route('candidate.quizzes.results', $previousAttempt->id)
                ->with('info', 'You have already completed this quiz.');
        }

        // Start a new attempt or resume an existing incomplete attempt
        $attempt = QuizAttempt::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'quiz_id' => $id,
                'completed_at' => null
            ],
            [
                'started_at' => now(),
            ]
        );

        return view('candidate.quizzes.show', compact('quiz', 'attempt'));
    }

    public function submit(Request $request, $id)
    {
        $quiz = Quiz::with('questions.options')->findOrFail($id);
        $attempt = QuizAttempt::where('user_id', Auth::id())
            ->where('quiz_id', $id)
            ->whereNull('completed_at')
            ->firstOrFail();

        // Delete any previous answers for this attempt
        UserAnswer::where('quiz_attempt_id', $attempt->id)->delete();

        // Process answers
        foreach ($quiz->questions as $question) {
            $answers = $request->input('question_' . $question->id, []);

            if (!is_array($answers)) {
                $answers = [$answers];
            }

            foreach ($answers as $optionId) {
                $option = $question->options()->find($optionId);
                if ($option) {
                    UserAnswer::create([
                        'quiz_attempt_id' => $attempt->id,
                        'question_id' => $question->id,
                        'option_id' => $option->id,
                        'is_correct' => $option->is_correct
                    ]);
                }
            }
        }

        // Complete the attempt
        $attempt->completed_at = now();
        $attempt->save();

        // Calculate score
        $score = $attempt->calculateScore();

        return redirect()->route('candidate.quizzes.results', $attempt->id);
    }

    public function results($attemptId)
    {
        $attempt = QuizAttempt::with(['quiz.questions.options', 'userAnswers.option'])
            ->where('user_id', Auth::id())
            ->findOrFail($attemptId);

        if (!$attempt->completed_at) {
            return redirect()->route('candidate.quizzes.show', $attempt->quiz_id)
                ->with('info', 'Please complete the quiz first.');
        }

        return view('candidate.quizzes.results', compact('attempt'));
    }
}
