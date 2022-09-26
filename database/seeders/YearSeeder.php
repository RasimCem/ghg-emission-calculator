<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Year::create(['year' => 2019]);
        Year::create(['year' => 2020]);
        Year::create(['year' => 2021]);
        Year::create(['year' => 2022]);

    }
}
