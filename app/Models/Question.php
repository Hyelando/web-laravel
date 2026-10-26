<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;

    public function answers(){
        return $this->hasMany(Answer::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hearts(){
        return $this->morphMany(Heart::class, 'heartable');
    }

    public function isHearted(){
        return $this->hearts()->where('user_id',1)->exists();
        }

    public function heart(){
        $this->hearts()->create([
            'user_id' => 1,
        ]);
    }
}
