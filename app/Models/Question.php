<?php

namespace App\Models;

use App\Traits\HasHeart;
use Database\Factories\QuestionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Italofantone\Sluggable\Sluggable;

class Question extends Model
{
    /** @use HasFactory<QuestionFactory> */
    use HasFactory;

    use HasHeart;
    use Sluggable;

protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
    ];
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::deleting(function ($question) {
            // 1. Recorrer las respuestas para eliminar sus comentarios y corazones asociados
            $question->answers->each(function ($answer) {
                $answer->comments()->delete();
                $answer->hearts()->delete();
                $answer->delete(); // Elimina la respuesta de forma segura
            });

            // 2. Eliminar los comentarios directos de la pregunta y sus corazones
            $question->comments->each(function ($comment) {
                $comment->hearts()->delete();
            });
            $question->comments()->delete();

            // 3. Eliminar los corazones de la propia pregunta
            $question->hearts()->delete();
        });
    }
}
