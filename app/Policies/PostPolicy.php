<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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

    public function update(User $user, Post $post)
    {
        return $user->admin;
    }

    public function delete(User $user, Post $post)
    {
        return $user->admin === true;
    }

    public function publish(User $user, Post $post)
    {
        return $user->admin===true;
    }

    public function viewUnpublished(User $user, Post $post)
    {
        return $user->admin===true;
    }

    public function viewAll(User $user, Post $post)
    {
        return $user->admin===true;
    }


}
