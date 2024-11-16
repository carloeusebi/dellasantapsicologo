<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Template extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'visible',
    ];

    public function otherUsersCanSee(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['visible'] ? 'Sì' : 'No',
        );
    }

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

    public function questionnaires(): BelongsToMany
    {
        return $this->belongsToMany(Questionnaire::class)
            ->withTrashed()
            ->withPivot('order')
            ->orderByPivot('order')
            ->orderByPivot('id');

    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
