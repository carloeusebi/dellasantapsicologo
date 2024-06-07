<?php

namespace App\Policies;

use App\Models\Questionnaire;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class QuestionnairePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Questionnaire $questionnaire): Response
    {
        return $user->isAdmin() || $questionnaire->visible || $questionnaire->user->is($user)
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    public function updateText(User $user, Questionnaire $questionnaire): bool
    {
        return $user->isAdmin() || $questionnaire->user->is($user);
    }

    public function updateStructure(User $user, Questionnaire $questionnaire): bool
    {
        return ($user->isAdmin() || $questionnaire->user->is($user)) && $questionnaire->surveys_count === 0;
    }

    public function delete(User $user, Questionnaire $questionnaire): bool
    {
        return ($user->isAdmin() || $questionnaire->user->is($user)) && $questionnaire->surveys_count === 0;
    }
}
