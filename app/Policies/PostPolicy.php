<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    public function before( $user, $ability)
    {
        //return false;
        if ($user->isSuperAdmin()) {
            //if ($ability == 'create') {
            //return true;
            //}
            return true;
        }
    }
    /**
     * Determine whether the user can view any posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPerm('posts');
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        return $user->hasPerm('posts.view');
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPerm('posts.create');
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        $perm = $user->hasPerm('posts.edit');
        if (!$perm) {
            return false;
        }

        return $post->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        $perm = $user->hasPerm('posts.delete');
        if (!$perm) {
            return false;
        }

        return $post->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        $perm = $user->hasPerm('posts.restore');
        if (!$perm) {
            return false;
        }

        return $post->user_id == $user->id;
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        $perm = $user->hasPerm('posts.forceDelete');
        if (!$perm) {
            return false;
        }

        return $post->user_id == $user->id;
    }

    public function trashed( $user)
    {
        return $user->hasPerm('posts.trashed');
    }
}
