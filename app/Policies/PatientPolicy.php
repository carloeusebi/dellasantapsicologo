<?php

namespace App\Policies;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PatientPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Patient $patient): Response
    {
        return $user->isAdmin() || $patient->user->is($user)
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    public function update(User $user, Patient $patient): bool
    {
        return $user->isAdmin() || $patient->user->is($user);
    }

    public function delete(User $user, Patient $patient): bool
    {
        return $user->isAdmin() || $patient->user->is($user);
    }

    public function archive(User $user, Patient $patient): bool
    {
        return $user->isAdmin() || $patient->user->is($user);
    }

}
