<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasRole(['superadmin']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\Permission $permission
     *
     * @return mixed
     */
    public function view(User $user, Permission $permission)
    {
        return $user->hasPermissionTo($permission->name);
    }

    /**
     * Determine whether the user can create models.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole(['superadmin']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\Permission $permission
     *
     * @return mixed
     */
    public function update(User $user, Permission $permission)
    {
        return $user->hasPermissionTo($permission->name);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\Permission $permission
     *
     * @return mixed
     */
    public function delete(User $user, Permission $permission)
    {
        return $user->hasPermissionTo($permission->name);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\Permission $permission
     *
     * @return mixed
     */
    public function restore(User $user, Permission $permission)
    {
        return $user->hasPermissionTo($permission->name);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\Permission $permission
     *
     * @return mixed
     */
    public function forceDelete(User $user, Permission $permission)
    {
        return $user->hasPermissionTo($permission->name);
    }
}
