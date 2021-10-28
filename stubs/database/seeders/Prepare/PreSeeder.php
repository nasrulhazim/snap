<?php

namespace Database\Seeders\Prepare;

use App\Concerns\Seeds\SeedingProgressBar;
use Illuminate\Database\Seeder;

class PreSeeder extends Seeder
{
    use SeedingProgressBar;

    public $seeders = [
        \Database\Seeders\Prepare\PermissionSeeder::class,
        \Database\Seeders\Prepare\SuperUserSeeder::class,
    ];
}
