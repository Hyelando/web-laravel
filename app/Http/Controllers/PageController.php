<?php

namespace App\Http\Controllers;

use App\Models\Question;

class PageController extends Controller
{
    public function index()
    {
        // 1. Obtenemos las preguntas de la base de datos
        $questions = Question::all();

        // 2. Las enviamos a la vista 'resources/views/pages/home.blade.php'
        return view('pages.home', compact('questions'));
    }
}
