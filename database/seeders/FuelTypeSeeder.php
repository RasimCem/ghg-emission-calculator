<?php

namespace Database\Seeders;

use App\Models\FuelType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FuelType::create(["name" => "Benzin", "factor_rate" => 1.5]);
        FuelType::create(["name" => "Dizel", "factor_rate" => 1.1]);
        FuelType::create(["name" => "Biyodizel", "factor_rate" => 0.9]);
        FuelType::create(["name" => "LPG", "factor_rate" => 1.3]);
    }
}
