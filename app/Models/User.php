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
    use HasFactory, HasPushSubscriptions, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (User $user): void {
            if (! $user->role_id) {
                $user->role()->associate(Role::where('name', Role::DOCTOR)->firstOrFail());
            }
        });
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isNotAdmin(): bool
    {
        return ! $this->isAdmin();
    }

    public function isAdmin(): bool
    {
        return $this->role?->name === Role::ADMIN;
    }

    public function isSuperUserOrAdmin(): bool
    {
        return $this->isSuperUser() || $this->isAdmin();
    }

    public function isSuperUser(): bool
    {
        return $this->role?->name === Role::SUPERUSER;
    }

    public function scopeDoctors(Builder $query): void
    {
        $query->whereRelation('role', 'name', Role::DOCTOR);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }

    public function questionnaires(): HasMany
    {
        return $this->hasMany(Questionnaire::class);
    }

    public function templates(): HasMany
    {
        return $this->hasMany(Template::class);
    }
}
