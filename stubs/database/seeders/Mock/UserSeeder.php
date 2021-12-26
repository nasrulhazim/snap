<?php

namespace Database\Seeders\Mock;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(600)->create()->each(function ($user) {
            $user->assignRole($this->getRole());
        });
    }

    private function getRole()
    {
        return \App\Models\Role::DEFAULT_ROLES[
            rand(0, count(\App\Models\Role::DEFAULT_ROLES) - 1)
        ];
    }
}
