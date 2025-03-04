<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;

class QuizSeeder extends Seeder
{
    public function run()
    {
        // Create YouCode PHP Quiz
        $phpQuiz = Quiz::create([
            'title' => 'PHP Programming Test',
            'description' => 'Test your knowledge of PHP fundamentals',
            'time_limit' => 30, // 30 minutes
            'passing_score' => 70,
            'is_active' => true
        ]);

        // Question 1 - Single choice
        $q1 = Question::create([
            'quiz_id' => $phpQuiz->id,
            'question_text' => 'What does PHP stand for?',
            'question_type' => 'single',
            'points' => 10
        ]);

        Option::create(['question_id' => $q1->id, 'option_text' => 'Personal Home Page', 'is_correct' => false]);
        Option::create(['question_id' => $q1->id, 'option_text' => 'PHP: Hypertext Preprocessor', 'is_correct' => true]);
        Option::create(['question_id' => $q1->id, 'option_text' => 'Private Hosting Platform', 'is_correct' => false]);
        Option::create(['question_id' => $q1->id, 'option_text' => 'Preformatted HTML Page', 'is_correct' => false]);

        // Question 2 - Multiple choice
        $q2 = Question::create([
            'quiz_id' => $phpQuiz->id,
            'question_text' => 'Which of the following are valid PHP array functions? (Select all that apply)',
            'question_type' => 'multiple',
            'points' => 15
        ]);

        Option::create(['question_id' => $q2->id, 'option_text' => 'array_push()', 'is_correct' => true]);
        Option::create(['question_id' => $q2->id, 'option_text' => 'array_pop()', 'is_correct' => true]);
        Option::create(['question_id' => $q2->id, 'option_text' => 'array_delete()', 'is_correct' => false]);
        Option::create(['question_id' => $q2->id, 'option_text' => 'array_merge()', 'is_correct' => true]);

        // Question 3 - Single choice
        $q3 = Question::create([
            'quiz_id' => $phpQuiz->id,
            'question_text' => 'Which function is used to open a file in PHP?',
            'question_type' => 'single',
            'points' => 10
        ]);

        Option::create(['question_id' => $q3->id, 'option_text' => 'open_file()', 'is_correct' => false]);
        Option::create(['question_id' => $q3->id, 'option_text' => 'fopen()', 'is_correct' => true]);
        Option::create(['question_id' => $q3->id, 'option_text' => 'read_file()', 'is_correct' => false]);
        Option::create(['question_id' => $q3->id, 'option_text' => 'file_open()', 'is_correct' => false]);

        // Question 4 - Multiple choice
        $q4 = Question::create([
            'quiz_id' => $phpQuiz->id,
            'question_text' => 'Which of these are valid ways to create a variable in PHP? (Select all that apply)',
            'question_type' => 'multiple',
            'points' => 15
        ]);

        Option::create(['question_id' => $q4->id, 'option_text' => '$variable = "value";', 'is_correct' => true]);
        Option::create(['question_id' => $q4->id, 'option_text' => 'var $variable = "value";', 'is_correct' => false]);
        Option::create(['question_id' => $q4->id, 'option_text' => '$variable = array("item");', 'is_correct' => true]);
        Option::create(['question_id' => $q4->id, 'option_text' => 'let $variable = "value";', 'is_correct' => false]);

        // Create JavaScript Quiz
        $jsQuiz = Quiz::create([
            'title' => 'JavaScript Basics',
            'description' => 'Test your knowledge of JavaScript fundamentals',
            'time_limit' => 25, // 25 minutes
            'passing_score' => 65,
            'is_active' => true
        ]);

        

        // JavaScript Quiz Questions
        $q5 = Question::create([
            'quiz_id' => $jsQuiz->id,
            'question_text' => 'Which keyword is used to declare a variable in JavaScript ES6?',
            'question_type' => 'single',
            'points' => 10
        ]);


        Option::create(['question_id' => $q5->id, 'option_text' => 'var', 'is_correct' => false]);
        Option::create(['question_id' => $q5->id, 'option_text' => 'let', 'is_correct' => true]);
        Option::create(['question_id' => $q5->id, 'option_text' => 'variable', 'is_correct' => false]);
        Option::create(['question_id' => $q5->id, 'option_text' => 'int', 'is_correct' => false]);

        $q6 = Question::create([
            'quiz_id' => $jsQuiz->id,
            'question_text' => 'Which of the following methods modify arrays in JavaScript? (Select all that apply)',
            'question_type' => 'multiple',
            'points' => 15
        ]);



        Option::create(['question_id' => $q6->id, 'option_text' => 'push()', 'is_correct' => true]);
        Option::create(['question_id' => $q6->id, 'option_text' => 'map()', 'is_correct' => false]);
        Option::create(['question_id' => $q6->id, 'option_text' => 'filter()', 'is_correct' => false]);
        Option::create(['question_id' => $q6->id, 'option_text' => 'splice()', 'is_correct' => true]);
    }
}
