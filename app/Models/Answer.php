<?php

namespace App\Models;

use App\Traits\HasHeart;
use Database\Factories\AnswerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /** @use HasFactory<AnswerFactory> */
    use HasFactory;

    use HasHeart;

    protected $fillable = [
        'content',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
