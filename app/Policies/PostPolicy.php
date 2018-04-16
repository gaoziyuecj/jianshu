<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Model\Post;


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

    /**
     * 修改权限
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function update(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }

    /**
     * 删除权限
     * @param User $user
     * @param Post $post
     */
    public function delete(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }
}
