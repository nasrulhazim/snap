<?php

namespace Database\Seeders\Demo;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(
            file_get_contents(storage_path('/data/demo/teams.json'))
        );

        foreach ($data as $datum) {
            $user = \App\Models\User::updateOrCreate([
                'email' => $datum->email,
            ], [
                'name' => $datum->name,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);

            $user->assignRole(['user']);
        }
    }
}
