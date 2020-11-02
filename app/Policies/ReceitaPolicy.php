<?php

namespace App\Policies;

use App\User;
use App\Receita;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReceitaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the receita.
     *
     * @param  \App\User  $user
     * @param  \App\Receita  $receita
     * @return mixed
     */
    public function view(User $user, Receita $receita)
    {
        return $user->id === $receita->user_id;
    }

    /**
     * Determine whether the user can create receitas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the receita.
     *
     * @param  \App\User  $user
     * @param  \App\Receita  $receita
     * @return mixed
     */
    public function update(User $user, Receita $receita)
    {
        return $user->id === $receita->user_id;
    }

    /**
     * Determine whether the user can delete the receita.
     *
     * @param  \App\User  $user
     * @param  \App\Receita  $receita
     * @return mixed
     */
    public function delete(User $user, Receita $receita)
    {
        return $user->id === $receita->user_id;
    }

    /**
     * Determine whether the user can restore the receita.
     *
     * @param  \App\User  $user
     * @param  \App\Receita  $receita
     * @return mixed
     */
    public function restore(User $user, Receita $receita)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the receita.
     *
     * @param  \App\User  $user
     * @param  \App\Receita  $receita
     * @return mixed
     */
    public function forceDelete(User $user, Receita $receita)
    {
        //
    }
}
