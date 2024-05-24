<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Choice extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'points',
        'text',
    ];

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }
}
