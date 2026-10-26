<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
    ];
    public function user(){
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

    public function unheart(){
        $this->hearts()->where('user_id',1)->delete();
    }
}
