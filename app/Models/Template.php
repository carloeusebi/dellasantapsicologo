<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'visible',
    ];

    public function otherUsersCanSee(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes['visible'] ? 'Sì' : 'No',
        );
    }

    public function scopeUserScope(Builder $query): Builder
    {
        return $query->whereRelation('user', 'id', auth()->id())
            ->orWhereRelation('user.role', 'name', Role::$ADMIN);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function questionnaires(): BelongsToMany
    {
        return $this->belongsToMany(Questionnaire::class)
            ->withPivot('order')
            ->orderByPivot('order')
            ->orderByPivot('id');

    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
