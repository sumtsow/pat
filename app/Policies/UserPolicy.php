<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user are admin.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function admin(User $user)
    {
        return $user->role === 'admin';
    }
}
