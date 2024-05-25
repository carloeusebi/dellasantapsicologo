<?php

namespace App\Policies;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SurveyPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Survey $survey): Response
    {
        return $user->isAdmin() || $survey->patient->user->is($user)
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    public function update(User $user, Survey $survey): bool
    {
        return $user->isAdmin() || $survey->patient->user->is($user);
    }

    public function delete(User $user, Survey $survey): bool
    {
        return $user->isAdmin() || $survey->patient->user->is($user);
    }
}
