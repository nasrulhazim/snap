<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class RolePolicy
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
     * @param \App\Models\Role $role
     *
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return $user->hasRole(['superadmin']);
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
     * @param \App\Models\Role $role
     *
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return ! in_array($role->name, \App\Models\Role::DEFAULT_ROLES);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\Role $role
     *
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return ! in_array($role->name, \App\Models\Role::DEFAULT_ROLES);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\Role $role
     *
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        return ! in_array($role->name, Role::DEFAULT_ROLES);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\Role $role
     *
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        return ! in_array($role->name, Role::DEFAULT_ROLES);
    }
}
