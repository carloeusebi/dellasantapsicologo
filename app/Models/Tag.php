<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = ['tag', 'color'];

    public function questionnaires(): BelongsToMany
    {
        return $this->belongsToMany(Questionnaire::class);
    }
}
