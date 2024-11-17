<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        User::whereIn('id', [1, 2])->get()->each(function (User $user) {
            $user->email_verified_at = now();
            $user->name = $user->id === 1 ? 'Federico Dellasanta' : 'Carlo Eusebi';
            $user->save();
        });
    }
};
