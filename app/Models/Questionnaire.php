<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Questionnaire extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'visible',
    ];

    protected $casts = [
        'visible' => 'boolean'
    ];

    /** @noinspection PhpUnused */
    public function scopeUserScope(Builder $query): void
    {
        $query->when(Auth::user()->isNotAdmin(), function (Builder $query) {
            $query->where('visible', true)
                ->orWhereRelation('user', 'id', Auth::id());
        });
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** @noinspection PhpUnused */
    function scopeFilterByTitle(Builder $query, string $search): void
    {
        $query->when($search, function (Builder $query, string $search) {
            $query->where(function (Builder $query) use ($search) {
                collect(explode(' ', $search))->each(function (string $term) use ($query) {
                    $query->where('title', 'LIKE', "%$term%");
                });
            });
        });
    }

    public function surveys(): BelongsToMany
    {
        return $this->belongsToMany(Survey::class)
            ->using(QuestionnaireSurvey::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class)
            ->orderBy('order');
    }

    public function choices(): MorphMany
    {
        return $this->morphMany(Choice::class, 'questionable');
    }

    public function variables(): HasMany
    {
        return $this->hasMany(Variable::class);
    }

    public function cutoffs(): HasManyThrough
    {
        return $this->hasManyThrough(Cutoff::class, Variable::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function templates(): BelongsToMany
    {
        return $this->belongsToMany(Template::class);
    }
}
