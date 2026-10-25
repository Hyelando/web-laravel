<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;


class QuestionController extends Controller
{
    public function show(Question $question)
    {
        $question->load('answers', 'category', 'user');

        return view('questions.show', 
        [
            'question' => $question,
        ]);
    }
}
