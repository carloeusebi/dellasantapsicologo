<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelArchivable\Archivable;

/**
 * @property Carbon $archived_at
 */
class Patient extends Model
{
    use Archivable;
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
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                return $attributes['first_name'].' '.$attributes['last_name'];
            }
        );
    }

    public function age(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                return $attributes['birth_date']
                    ? (int) Carbon::parse($attributes['birth_date'])->diffInYears()
                    : null;
            }
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function surveys(): HasMany
    {
        return $this->hasMany(Survey::class);
    }
}
