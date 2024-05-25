<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    public static string $ADMIN = 'admin';
    public static string $DOCTOR = 'doctor';
    public static string $PATIENT = 'patient';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'label',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
