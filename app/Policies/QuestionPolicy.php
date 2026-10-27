<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;

class QuestionPolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(User $user,Question $question)
    {
        return $user->id === $question->user_id;
    }

    public function update(User $user,Question $question)
    {
        $isOwner = $user->id === $question->user_id;
        $isEmpty = $question->answers->count() === 0 && $question->comments->count() === 0;

        return $isOwner && $isEmpty;
    }
}
