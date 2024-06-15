<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->isSuperUserOrAdmin();
    }

    public function update(User $user): bool
    {
        return $user->isSuperUserOrAdmin();
    }

    public function delete(User $user): bool
    {
        return $user->isSuperUserOrAdmin();
    }
}
