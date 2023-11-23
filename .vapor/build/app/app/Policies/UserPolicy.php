<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, User $userToView): bool
    {
        return $user->type === 'admin' || $user->id === $userToView->id;
    }

    public function edit(User $user, User $userToView): bool
    {
        return $user->type === 'admin' || $user->id === $userToView->id;
    }
}
