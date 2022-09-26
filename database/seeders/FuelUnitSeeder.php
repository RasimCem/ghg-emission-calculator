<?php

namespace Database\Seeders;

use App\Models\FuelUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuelUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FuelUnit::create(["name" => "Varil", "factor_rate" => 7.2]);
        FuelUnit::create(["name" => "Galon", "factor_rate" => 1]);
    }
}
