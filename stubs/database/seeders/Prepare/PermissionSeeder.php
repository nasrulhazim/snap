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
        collect(config('access-matrix.roles'))->each(function ($role) {
            Role::updateOrCreate(['name' => $role, 'guard_name' => 'web']);
        });
    }

    private function seedPermissions()
    {
        $permissions = collect(config('access-matrix.roles_permissions'));
        Role::query()->each(function ($role) use ($permissions) {
            $permissions->each(function ($roles, $permission) use ($role) {
                $permission = \Spatie\Permission\Models\Permission::updateOrCreate([
                    'name' => $permission,
                    'guard_name' => 'web',
                ]);
                foreach ($roles as $role_permission) {
                    if ($role->name == $role_permission) {
                        if ($role && ! $role->hasPermissionTo($permission)) {
                            $role->givePermissionTo($permission);
                        }
                    }
                }
            });
        });
    }
}
