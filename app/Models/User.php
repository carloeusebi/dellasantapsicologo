<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use NotificationChannels\WebPush\HasPushSubscriptions;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasPushSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (User $user): void {
            $user->role()->associate(Role::where('name', Role::$DOCTOR)->firstOrFail());
        });
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }

    public function templates(): HasMany
    {
        return $this->hasMany(Template::class);
    }

    public function isNotAdmin(): bool
    {
        return !$this->isAdmin();
    }

    public function isAdmin(): bool
    {
        return $this->role?->name === Role::$ADMIN;
    }

    public function isSuperUserOrAdmin(): bool
    {
        return $this->isSuperUser() || $this->isAdmin();
    }

    public function isSuperUser(): bool
    {
        return $this->role?->name === Role::$SUPERUSER;
    }

    public function scopeDoctors(Builder $query): void
    {
        $query->whereRelation('role', 'name', Role::$DOCTOR);
    }

    public function questionnaires(): HasMany
    {
        return $this->hasMany(Questionnaire::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
