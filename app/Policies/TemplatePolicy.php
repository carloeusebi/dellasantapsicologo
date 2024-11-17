<?php

namespace App\Policies;

use App\Models\Template;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TemplatePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Template $template): bool
    {
        return $template->user->is($user) || $template->is_visible || $user->isAdmin();
    }

    public function update(User $user, Template $template): bool
    {
        return $user->is($template->user) || $user->isAdmin();
    }

    public function delete(User $user, Template $template): bool
    {
        return $user->is($template->user) || $user->isAdmin();
    }

    public function restore(User $user, Template $template): bool
    {
        return $user->is($template->user) || $user->isAdmin();
    }

    public function forceDelete(User $user, Template $template): bool
    {
        return $user->is($template->user) || $user->isAdmin();
    }
}
