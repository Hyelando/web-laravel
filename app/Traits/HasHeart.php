<?php

namespace App\Traits;

use App\Models\Heart;

/**
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Heart[] $hearts
 */

trait HasHeart
{
    public function hearts()
    {
        return $this->morphMany(Heart::class, 'heartable');
    }

    public function isHearted()
    {
        if($this->relationLoaded('hearts')){
            return $this->hearts->isNotEmpty();
        }
        return $this->hearts()->where('user_id', auth()->id())->exists();
    }

    public function heart()
    {
        $this->hearts()->create([
            'user_id' => auth()->id(),
        ]);
    }

    public function unheart()
    {
        $this->hearts()->where('user_id', auth()->id())->delete();
    }
}
