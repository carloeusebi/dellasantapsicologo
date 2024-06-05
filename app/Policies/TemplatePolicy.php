<?php

namespace App\Policies;

use App\Models\Template;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TemplatePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Template $template): Response
    {
        return ($user->is($template->user)) || $template->visible || $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    public function update(User $user, Template $template): bool
    {
        return ($user->is($template->user)) || $user->isAdmin();
    }

    public function delete(User $user, Template $template): bool
    {
        return ($user->is($template->user)) || $user->isAdmin();
    }

    public function restore(User $user, Template $template): bool
    {
        return ($user->is($template->user)) || $user->isAdmin();
    }

    public function forceDelete(User $user, Template $template): bool
    {
        return ($user->is($template->user)) || $user->isAdmin();
    }
}
