<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Choice extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'questionable_id',
        'points',
        'text',
    ];

    public function questionable(): MorphTo
    {
        return $this->morphTo();
    }
}
