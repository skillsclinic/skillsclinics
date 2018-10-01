<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->role === User::ADMIN) {
            return true;
        }
//        elseif ($user->role === User::STA) {
//            return true;
//        } elseif ($user->role === User::SENIOR_MENTOR) {
//            return true;
//        } elseif ($user->role === User::JUNIOR_MENTOR) {
//            return true;
//        }elseif ($user->role === User::STREAM) {
//            return true;
//        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User $user
     * @param  \App\User $model
     * @return mixed
     */
    public function view(User $authenticatedUser, User $user)
    {
        //
        if($authenticatedUser->role === 'sta'){
            if($user->role === 'admin'){
                return false;
            }
            return true;
        }
        elseif($authenticatedUser->role === 'seniorMentor'){
            if($user->role === 'admin' || $user->role === 'sta'){
                return false;
            }
            return true;
        }
        elseif($authenticatedUser->role === 'juniorMentor'){
            if($user->role === 'admin' || $user->role === 'sta' || $user->role === 'seniorMentor'){
                return false;
            }
            return true;
        }
        elseif($authenticatedUser->role === 'stream'){
            if($user->role === 'admin' || $user->role === 'sta' || $user->role === 'seniorMentor' || $user->role === 'juniorMentor'){
                return false;
            }
            return true;
        }

        return $authenticatedUser->id === $user->id;
    }


    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User $user
     * @param  \App\User $model
     * @return mixed
     */
    public function update(User $authenticatedUser, User $user)
    {
        //
        return $authenticatedUser->id === $user->id;
    }

//    /**
//     * Determine whether the user can delete the model.
//     *
//     * @param  \App\User  $user
//     * @param  \App\User  $model
//     * @return mixed
//     */
//    public function delete(User $user, User $model)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can restore the model.
//     *
//     * @param  \App\User  $user
//     * @param  \App\User  $model
//     * @return mixed
//     */
//    public function restore(User $user, User $model)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can permanently delete the model.
//     *
//     * @param  \App\User  $user
//     * @param  \App\User  $model
//     * @return mixed
//     */
//    public function forceDelete(User $user, User $model)
//    {
//        //
//    }
}
