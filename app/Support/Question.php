<?php

namespace App\Support;

use App\Models\Question as ModelsQuestion;

class Question
{
    public function load(ModelsQuestion $question)
    {
        return $question->load($this->getRelations());
    }

    public function getRelations()
    {
        $userId = auth()->id();

        return [
            'user',
            'category',
            'answers' => fn($query) => $query->with([
                'user',
                'hearts' => fn($query) => $query->where('user_id', $userId),
                'comments' => fn($query) => $query->with([
                    'user',
                    'hearts' => fn($query) => $query->where('user_id', $userId),
                ]),
            ]),
            'comments' => fn($query) => $query->with([
                'user',
                'hearts' => fn($query) => $query->where('user_id', $userId),
            ]),
            'hearts' => fn($query) => $query->where('user_id', $userId),
        ];
    } 
}