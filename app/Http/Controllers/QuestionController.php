<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Result;
use Illuminate\Http\Request;

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

            $userAnswer = $request->input('question_' . $question->id);

            if ($userAnswer == $question->correct_answer) {
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