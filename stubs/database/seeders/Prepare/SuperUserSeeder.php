<?php

namespace Database\Seeders\Prepare;

use App\Models\User;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::updateOrCreate([
            'name' => 'Superadmin',
            'email' => 'superadmin@app.com',
        ], [
            'password' => Hash::make('StrongPassword1234^|'),
            'email_verified_at' => now(),
        ]);

        $user->assignRole(Role::DEFAULT_ROLES);

        event(new Registered($user));
    }
}
