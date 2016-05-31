<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function view()
    {
        return true;
    }

    /**
     * @param \App\User $user
     * @param  \App\Post $post
     * @return bool
     */
    public function edit(User $user, Post $post)
    {
        return false;
    }


    /**
     * @param \App\User $user
     * @param  \App\Post $post
     * @return bool
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->author_id;
    }



}
