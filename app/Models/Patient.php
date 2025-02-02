<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use LaravelArchivable\Archivable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property Carbon $archived_at
 */
class Patient extends Model implements HasMedia
{
    use Archivable;
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birth_date',
        'birth_place',
        'address',
        'codice_fiscale',
        'therapy_start_date',
        'email',
        'phone',
        'weight',
        'height',
        'qualification',
        'job',
        'cohabitants',
        'drugs',
    ];

    protected $casts = [
        'birth_date' => 'datetime',
        'therapy_start_date' => 'datetime',
        'archived_at' => 'datetime',
    ];

    public static function boot(): void
    {
        parent::boot();

        self::creating(function (Patient $patient) {
            if (empty($patient->therapy_start_date)) {
                $patient->therapy_start_date = now();
            }
            $patient->first_name = ucfirst($patient->first_name);
            $patient->last_name = ucfirst($patient->last_name);
        });
    }

    /** @noinspection PhpUnused */
    public function scopeUserScope(Builder $query): void
    {
        if (Auth::user()->isNotAdmin()) {
            $query->whereRelation('user', 'id', Auth::id());
        }
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return Attribute<string, never>
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['first_name'].' '.$attributes['last_name']
        );
    }

    /**
     * @return Attribute<int, never>
     */
    protected function age(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                return $attributes['birth_date']
                    ? (int) Carbon::parse($attributes['birth_date'])->diffInYears()
                    : null;
            }
        );
    }

    public function isFemale(): Attribute
    {
        return Attribute::make(fn (mixed $value, array $attributes) => $attributes['gender'] === 'F');
    }

    public function gender(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => match ($value) {
                'M' => 'Maschio',
                'F' => 'Femmina',
                'O' => 'Altro',
                default => null
            },
            set: fn (mixed $value) => match ($value) {
                'Maschio' => 'M',
                'Femmina' => 'F',
                'Altro' => 'O',
                default => null,
            }
        );
    }

    /**
     * @return HasMany<Survey, $this>
     */
    public function surveys(): HasMany
    {
        return $this->hasMany(Survey::class)
            ->latest();
    }

    public function scopeFilterByName(Builder $query, string $search): void
    {
        $query->when($search, function (Builder $query, string $search) {
            collect(explode(' ', $search))->each(function (string $term) use ($query) {
                $query->where(function (Builder $query) use ($term) {
                    $query->where('first_name', 'LIKE', "%$term%")
                        ->orwhere('last_name', 'LIKE', "%$term%");
                });
            });
        });
    }

    public function resolveRouteBinding($value, $field = null): ?Patient
    {
        return $this->whereId($value) // @phpstan-ignore-line
            ->withArchived()
            ->firstOrFail();
    }
}
