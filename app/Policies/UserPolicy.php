<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the profile.
     *
     * @param  App\User  $user
     * @param  App\User  $profile
     * @return mixed
     */
    public function show(User $user, User $profile)
    {
        return $user->id === $profile->id || $user->isAdmin();
    }

    /**
     * Determine whether the user can create profile.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @param  App\User  $user
     * @param  App\User  $profile
     * @return mixed
     */
    public function update(User $user, User $profile)
    {
        return $user->id === $profile->id || $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the profile.
     *
     * @param  App\User  $user
     * @param  App\User  $profile
     * @return mixed
     */
    public function delete(User $user, User $profile)
    {
        return $user->id === $profile->id || $user->isAdmin();
    }
}
