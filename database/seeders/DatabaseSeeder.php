<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FuelUnit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FacilitySeeder::class,
            YearSeeder::class,
            FuelTypeSeeder::class,
            FuelUnitSeeder::class
        ]);
    }
}
