<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Choice extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $touches = ['questionable'];

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
