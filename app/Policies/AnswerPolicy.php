<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Answer $answer): bool
    {
        return $user->isAdmin() || $answer->questionnaireSurvey->survey->patient->user->is($user);
    }
}
