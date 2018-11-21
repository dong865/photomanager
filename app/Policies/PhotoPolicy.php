<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Photo;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
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

    public function delete(Admin $admin, Photo $photo)
    {
        //
        return $admin->id === $photo->admin_id;
    }

    public function edit(Admin $admin,Photo $photo){
        return $admin->id === $photo->admin_id;
    }

    public function before($user, $ability)
    {
        // 如果用户拥有管理内容的权限的话，即授权通过
        if ($user->can('manage_contents')) {
            return true;
        }
    }
}
