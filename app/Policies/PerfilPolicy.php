<?php

namespace App\Policies;

use App\User;
use App\Perfil;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerfilPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the perfil.
     *
     * @param  \App\User  $user
     * @param  \App\Perfil  $perfil
     * @return mixed
     */
    public function view(User $user, Perfil $perfil)
    {
        return $user->id === $perfil->user_id;
    }

    /**
     * Determine whether the user can create perfils.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the perfil.
     *
     * @param  \App\User  $user
     * @param  \App\Perfil  $perfil
     * @return mixed
     */
    public function update(User $user, Perfil $perfil)
    {
        return $user->id === $perfil->user_id;
    }

    /**
     * Determine whether the user can delete the perfil.
     *
     * @param  \App\User  $user
     * @param  \App\Perfil  $perfil
     * @return mixed
     */
    public function delete(User $user, Perfil $perfil)
    {
        //
    }

    /**
     * Determine whether the user can restore the perfil.
     *
     * @param  \App\User  $user
     * @param  \App\Perfil  $perfil
     * @return mixed
     */
    public function restore(User $user, Perfil $perfil)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the perfil.
     *
     * @param  \App\User  $user
     * @param  \App\Perfil  $perfil
     * @return mixed
     */
    public function forceDelete(User $user, Perfil $perfil)
    {
        //
    }
}
