<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
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

    public function update(User $user)
    {
        return $user->admin;
    }

    public function delete(User $user)
    {
        return $user->admin;
    }

    public function publish(User $user)
    {
        return $user->admin;
    }

    public function viewUnpublished(User $user)
    {
        return $user->admin;
    }

    public function viewAll(User $user)
    {
        return $user->admin;
    }


}
