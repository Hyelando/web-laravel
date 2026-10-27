<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store;
use App\Http\Requests\Update;
use App\Models\Category;
use App\Models\Question;
use App\Support\Question as SupportQuestion;

class QuestionController extends Controller
{
    public function index(){
        $question = Question::with([
            'user',
            'category',
        ])
        ->latest()
        ->paginate(24);

        return view('questions.index',[
            'questions' => $question,
        ]);
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('home');
    }

    public function create(){
        $categories = Category::all();

        return view('questions.create', compact('categories'));
    }

    public function store(Store $request){

        $question = Question::create([

            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('questions.show', $question);
    }
    public function edit(Question $question){
        return view('questions.edit',[
            'question' => $question,
            'categories' => Category::all(),
        ]);
    }
    public function show(Question $question, SupportQuestion $loader)
    {
        $loader->load($question);
        return view('questions.show', compact('question'));
        
    }

    public function update(Update $request, Question $question)
    {

        $question->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('questions.show', $question);
        }
}
