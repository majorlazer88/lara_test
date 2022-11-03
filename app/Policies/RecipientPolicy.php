<?php

namespace App\Policies;

use App\Models\Recipient;
use App\Models\User;
// use Illuminate\Auth\Access\HandlesAuthorization;

class RecipientPolicy
{
    // use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recipient  $recipient
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Recipient $recipient)
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
        //
    }

    public function update(User $user, Recipient $recipient)
    {
        return $user->id === $recipient->all()->first()->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recipient  $recipient
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Recipient $recipient)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recipient  $recipient
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Recipient $recipient)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recipient  $recipient
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Recipient $recipient)
    {
        //
    }
}
