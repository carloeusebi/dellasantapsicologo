<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use Hasfactory;

    const string ADMIN = 'admin';

    const string DOCTOR = 'doctor';

    const string SUPERUSER = 'superuser';

    const string PATIENT = 'patient';

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
