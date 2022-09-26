<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facility::create(["name" => "A Tesisi"]);
        Facility::create(["name" => "B Tesisi"]);
        Facility::create(["name" => "C Tesisi"]);
        Facility::create(["name" => "D Tesisi"]);
        Facility::create(["name" => "E Tesisi"]);
    }
}
