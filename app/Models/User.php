<?php

namespace App\Models;

use App\Notifications\NewUserRegisteredNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use NotificationChannels\WebPush\HasPushSubscriptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasFactory, HasPushSubscriptions, Notifiable, InteractsWithMedia;

    const string LOGO_COLLECTION = 'logo';

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
            $user->role()->associate(Role::where('name', Role::DOCTOR)->firstOrFail());
        });

        static::created(function (User $user): void {
            Notification::send(
                User::whereRelation('role', 'name', Role::ADMIN)->get(),
                new NewUserRegisteredNotification($user)
            );
        });
    }

    public function hasLogo(): bool
    {
        return $this->getFirstMedia(self::LOGO_COLLECTION) !== null;
    }

    public function logoUrl(): string
    {
        return $this->hasLogo()
            ? $this->getFirstMediaUrl(self::LOGO_COLLECTION)
            : asset('images/Logo.png');
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function updateLogo(TemporaryUploadedFile $logo): void
    {
        $justUploadedLogo = $this->addMedia($logo)
            ->toMediaCollection(self::LOGO_COLLECTION);

        $this->clearMediaCollectionExcept(self::LOGO_COLLECTION, $justUploadedLogo);
    }

    public function deleteLogo(): void
    {
        $this->clearMediaCollection(self::LOGO_COLLECTION);
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
