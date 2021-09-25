<?php

namespace Database\Seeders\Prepare;

use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedRoles();
        $this->seedPermissions();
    }

    private function seedRoles()
    {
        $roles = collect(\App\Models\Role::DEFAULT_ROLES)->transform(function ($role) {
            return ['name' => $role, 'guard_name' => 'web'];
        });

        Role::insert($roles->all());
    }

    private function seedPermissions()
    {
        $permissions = collect(\App\Models\Permission::DEFAULT_PERMISSIONS);
        Role::query()->each(function ($role) use ($permissions) {
            $permissions->each(function ($permission) use ($role) {
                $permission = \Spatie\Permission\Models\Permission::updateOrCreate([
                    'name' => $permission.' '.$role->name,
                    'guard_name' => $role->guard_name,
                ]);

                if ($role && ! $role->hasPermissionTo($permission)) {
                    $role->givePermissionTo($permission);
                }
            });
        });
    }
}
