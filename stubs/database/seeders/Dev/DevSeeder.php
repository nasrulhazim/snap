<?php

namespace Database\Seeders;

use App\Concerns\Seeds\SeedingProgressBar;
use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    use SeedingProgressBar;

    public $seeders = [
        \Database\Seeders\Mock\UserSeeder::class,
    ];
}
