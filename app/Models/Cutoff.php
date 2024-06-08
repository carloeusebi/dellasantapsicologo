<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cutoff extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'from',
        'to',
        'type',
        'fem_from',
        'fem_to',
    ];

    protected $touches = ['variable.questionnaire'];

    public function hasScored(int $score, bool $isFemale = false): bool
    {
        $from = $isFemale && isset($this->fem_from) ? $this->fem_from : $this->from;
        $to = $isFemale && isset($this->fem_to) ? $this->fem_to : $this->to;

        if ($this->type === 'greater_than') {
            return $score > $from;
        } elseif ($this->type === 'lesser_than') {
            return $score < $from;
        } else { // $this->type === 'range'
            return $score >= $from && $score <= $to;
        }
    }

    /** @noinspection PhpUnused */
    public function wellFormedTarget(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                if ($attributes['type'] === 'greater_than') {
                    return 'Se più di '.$attributes['from'];
                } elseif ($attributes['type'] === 'lesser_than') {
                    return 'Se meno di '.$attributes['from'];
                } else { // $attributes['type'] === 'range'
                    return 'Tra '.$attributes['from'].' e '.$attributes['to'];
                }
            }
        );
    }

    /** @noinspection PhpUnused */
    public function wellFormTargetForFemale(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                if ($attributes['type'] === 'greater_than' && isset($attributes['fem_from'])) {
                    return 'Se più di '.$attributes['fem_from'].' (F)';
                } elseif ($attributes['type'] === 'lesser_than' && isset($attributes['fem_from'])) {
                    return 'Se meno di '.$attributes['fem_from'].' (F)';
                } elseif (isset($attributes['fem_from']) && isset($attributes['fem_to'])) { // $attributes['type'] === 'range'
                    return 'Tra '.$attributes['fem_from'].' e '.$attributes['fem_to'].' (F)';
                }
                return $this->well_formed_target;
            }
        );
    }

    public function variable(): BelongsTo
    {
        return $this->belongsTo(Variable::class);
    }
}
