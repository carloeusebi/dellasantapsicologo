<?php

namespace App\Policies;

use App\Models\Questionnaire;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionnairePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Questionnaire $questionnaire): bool
    {
        return $user->isAdmin() || $questionnaire->visible || $questionnaire->user->is($user);
    }

    public function update(User $user, Questionnaire $questionnaire): bool
    {
        return $this->updateText($user, $questionnaire) || $this->updateStructure($user, $questionnaire);
    }

    public function updateText(User $user, Questionnaire $questionnaire): bool
    {
        return $user->isAdmin() || $questionnaire->user->is($user);
    }

    public function updateStructure(User $user, Questionnaire $questionnaire): bool
    {
        $questionnaire = $this->withSurveysCount($questionnaire);
        return ($user->isAdmin() || $questionnaire->user->is($user)) && $questionnaire->surveys_count === 0;
    }

    private function withSurveysCount(Questionnaire $questionnaire): Questionnaire
    {
        if ($questionnaire->surveys_count === null) {
            $questionnaire->loadCount('surveys');
        }
        return $questionnaire;
    }

    public function delete(User $user, Questionnaire $questionnaire): bool
    {
        return ($user->isAdmin() || $questionnaire->user->is($user));
    }

    public function forceDelete(User $user, Questionnaire $questionnaire): bool
    {
        $questionnaire->loadCount('surveys');
        return ($user->isAdmin() || $questionnaire->user->is($user)) && $questionnaire->surveys_count === 0;
    }
}
