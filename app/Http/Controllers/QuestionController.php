<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Models\Answer;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('quiz', compact('questions'));
    }

    public function submit(Request $request)
    {
        $questions = Question::all();

        $score = 0;

        foreach ($questions as $question) {

            $selectedAnswers = $request->input('question_' . $question->id);

            if (!$selectedAnswers) {
                continue;
            }

            if (!is_array($selectedAnswers)) {
                $selectedAnswers = [$selectedAnswers];
            }

            sort($selectedAnswers);

            $correctAnswers = $question->answers
                ->where('is_correct', 1)
                ->pluck('id')
                ->toArray();

            sort($correctAnswers);

            if ($selectedAnswers == $correctAnswers) {
                $score++;
            }
        }

        Result::create([
            'user_id' => auth()->id(),
            'score' => $score
        ]);

        return view('result', compact('score'));
    }
}
