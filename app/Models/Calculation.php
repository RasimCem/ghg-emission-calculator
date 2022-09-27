<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Calculation extends Model
{
    use HasFactory;

    protected $fillable = ["facility_id", "fuel_type_id", "unit_id", "year", "amount_of_fuel", "co2", "ch4", "n2o", "co2e"];
    const CO2_RATE_FACTOR = 0.57;
    const CH4_RATE_FACTOR = 0.25;
    const N2O_RATE_FACTOR = 0.18;
    const CO2E_RATE_FACTOR = 1;
    const GAS_TYPES = [
        self::CO2_RATE_FACTOR,
        self::CH4_RATE_FACTOR,
        self::N2O_RATE_FACTOR,
        self::CO2E_RATE_FACTOR,
    ];

    public function fuelType(): HasOne
    {
        return $this->hasOne(FuelType::class, 'id', 'fuel_type_id');
    }

    public function fuelUnit(): HasOne
    {
        return $this->hasOne(FuelUnit::class, 'id', 'unit_id');
    }

}
