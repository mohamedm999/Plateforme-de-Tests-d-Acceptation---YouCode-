<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'started_at',
        'completed_at',
        'score',
        'passed'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }

    public function getTimeSpentAttribute()
    {
        if ($this->completed_at) {
            return $this->started_at->diffInMinutes($this->completed_at);
        }
        return null;
    }

    public function calculateScore()
    {
        $totalPoints = $this->quiz->total_points;
        $earnedPoints = 0;

        foreach ($this->quiz->questions as $question) {
            $correctlyAnswered = true;

            // Get all user answers for this question
            $userAnswersForQuestion = $this->userAnswers()
                ->whereHas('question', function ($q) use ($question) {
                    $q->where('id', $question->id);
                })->get();

            // For multiple correct answers, check if user selected all correct options and no wrong ones
            if ($question->multiple_answers) {
                $correctOptions = $question->correctOptions()->count();
                $correctUserAnswers = $userAnswersForQuestion->where('is_correct', true)->count();
                $totalUserAnswers = $userAnswersForQuestion->count();

                // User must have selected all correct options and no incorrect ones
                if ($correctUserAnswers != $correctOptions || $totalUserAnswers != $correctUserAnswers) {
                    $correctlyAnswered = false;
                }
            }
            // For single correct answer, check if the user selected the correct option
            else {
                if ($userAnswersForQuestion->count() != 1 || !$userAnswersForQuestion->first()->is_correct) {
                    $correctlyAnswered = false;
                }
            }

            if ($correctlyAnswered) {
                $earnedPoints += $question->points;
            }
        }

        $percentageScore = $totalPoints > 0 ? round(($earnedPoints / $totalPoints) * 100) : 0;

        $this->score = $percentageScore;
        $this->passed = $percentageScore >= $this->quiz->passing_score;
        $this->save();

        return $percentageScore;
    }
}
