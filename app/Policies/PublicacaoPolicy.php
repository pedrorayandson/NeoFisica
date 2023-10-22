<?php

namespace App\Policies;

use App\Models\Publicacao;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PublicacaoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Publicacao  $publicacao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Publicacao $publicacao)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->is_admin == 1 ?
                Response::allow() :
                Response::deny("Você não tem permissão para acessar esta página", 401);
    }

    public function store(User $user): Response|bool
    {
        return $user->is_admin == 1 ?
                Response::allow(200) :
                Response::denyWithStatus(401);
    }

    public function edit (User $user) : Response
    {
        return $user->is_admin == 1 ?
                Response::allow() :
                Response::deny("Você não tem permissão para acessar esta página", 401);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Publicacao  $publicacao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->is_admin == 1 ?
                Response::allow(200) :
                Response::denyWithStatus(401);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Publicacao  $publicacao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->is_admin == 1 ?
                Response::allow(200) :
                Response::denyWithStatus(401);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Publicacao  $publicacao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Publicacao $publicacao)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Publicacao  $publicacao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Publicacao $publicacao)
    {
        //
    }
}
