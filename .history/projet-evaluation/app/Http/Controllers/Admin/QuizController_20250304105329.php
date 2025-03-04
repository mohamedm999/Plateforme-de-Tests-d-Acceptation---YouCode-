<?php

namespace App\Http\Controllers\Admin\Quizzes;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::withCount('questions')->latest()->get();
        return view('admin.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('admin.quizzes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time_limit' => 'nullable|integer|min:1',
            'passing_score' => 'required|integer|min:1|max:100',
            'is_active' => 'boolean',
        ]);

        Quiz::create($request->all());

        return redirect()->route('admin.quizzes.index')
            ->with('success', 'Quiz created successfully.');
    }

    public function show(Quiz $quiz)
    {
        $quiz->load('questions.options');
        return view('admin.quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        return view('admin.quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time_limit' => 'nullable|integer|min:1',
            'passing_score' => 'required|integer|min:1|max:100',
            'is_active' => 'boolean',
        ]);

        $quiz->update($request->all());

        return redirect()->route('admin.quizzes.index')
            ->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('admin.quizzes.index')
            ->with('success', 'Quiz deleted successfully.');
    }

    public function questions(Quiz $quiz)
    {
        $quiz->load('questions.options');
        return view('admin.quizzes.questions', compact('quiz'));
    }

    public function addQuestion(Request $request, Quiz $quiz)
    {
        $request->validate([
            'question_text' => 'required|string',
            'multiple_answers' => 'boolean',
            'points' => 'required|integer|min:1',
            'options' => 'required|array|min:2',
            'options.*.text' => 'required|string',
            'options.*.is_correct' => 'required|boolean',
        ]);

        // Check that at least one option is marked as correct
        $hasCorrectOption = false;
        foreach ($request->options as $option) {
            if (!empty($option['is_correct'])) {
                $hasCorrectOption = true;
                break;
            }
        }

        if (!$hasCorrectOption) {
            return redirect()->back()->withErrors(['options' => 'At least one option must be marked as correct.'])->withInput();
        }

        DB::transaction(function () use ($request, $quiz) {
            $question = Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => $request->question_text,
                'multiple_answers' => $request->multiple_answers ?? false,
                'points' => $request->points,
            ]);

            foreach ($request->options as $optionData) {
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $optionData['text'],
                    'is_correct' => !empty($optionData['is_correct']),
                ]);
            }
        });

        return redirect()->route('admin.quizzes.questions', $quiz->id)
            ->with('success', 'Question added successfully.');
    }

    public function editQuestion(Quiz $quiz, Question $question)
    {
        if ($question->quiz_id !== $quiz->id) {
            abort(404);
        }

        return view('admin.quizzes.edit-question', compact('quiz', 'question'));
    }

    public function updateQuestion(Request $request, Quiz $quiz, Question $question)
    {
        if ($question->quiz_id !== $quiz->id) {
            abort(404);
        }

        $request->validate([
            'question_text' => 'required|string',
            'multiple_answers' => 'boolean',
            'points' => 'required|integer|min:1',
            'options' => 'required|array|min:2',
            'options.*.id' => 'nullable|exists:options,id',
            'options.*.text' => 'required|string',
            'options.*.is_correct' => 'required|boolean',
        ]);

        // Check that at least one option is marked as correct
        $hasCorrectOption = false;
        foreach ($request->options as $option) {
            if (!empty($option['is_correct'])) {
                $hasCorrectOption = true;
                break;
            }
        }

        if (!$hasCorrectOption) {
            return redirect()->back()->withErrors(['options' => 'At least one option must be marked as correct.'])->withInput();
        }

        DB::transaction(function () use ($request, $question) {
            $question->update([
                'question_text' => $request->question_text,
                'multiple_answers' => $request->multiple_answers ?? false,
                'points' => $request->points,
            ]);

            // Get existing option IDs
            $existingOptionIds = $question->options->pluck('id')->toArray();
            $updatedOptionIds = [];

            foreach ($request->options as $optionData) {
                if (!empty($optionData['id'])) {
                    // Update existing option
                    $option = Option::find($optionData['id']);
                    if ($option && $option->question_id === $question->id) {
                        $option->update([
                            'option_text' => $optionData['text'],
                            'is_correct' => !empty($optionData['is_correct']),
                        ]);
                        $updatedOptionIds[] = $option->id;
                    }
                } else {
                    // Create new option
                    $option = Option::create([
                        'question_id' => $question->id,
                        'option_text' => $optionData['text'],
                        'is_correct' => !empty($optionData['is_correct']),
                    ]);
                    $updatedOptionIds[] = $option->id;
                }
            }

            // Delete options that weren't included in the update
            $optionsToDelete = array_diff($existingOptionIds, $updatedOptionIds);
            Option::whereIn('id', $optionsToDelete)->delete();
        });

        return redirect()->route('admin.quizzes.questions', $quiz->id)
            ->with('success', 'Question updated successfully.');
    }

    public function destroyQuestion(Quiz $quiz, Question $question)
    {
        if ($question->quiz_id !== $quiz->id) {
            abort(404);
        }

        $question->delete();

        return redirect()->route('admin.quizzes.questions', $quiz->id)
            ->with('success', 'Question deleted successfully.');
    }
}
