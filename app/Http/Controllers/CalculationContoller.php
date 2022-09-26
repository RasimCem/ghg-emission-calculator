<?php

namespace App\Http\Controllers;

use App\Http\Requests\Calculation\CalculateRequest;
use App\Http\Requests\Calculation\StoreRequest;
use App\Models\Calculation;
use App\Models\Facility;
use App\Models\FuelType;
use App\Models\FuelUnit;
use App\Models\Year;
use Illuminate\Http\Request;

class CalculationContoller extends Controller
{
    public function index()
    {
//        Calculation::all()->
        return view('index')->with([
            'facilities' => Facility::all(),
            'years' => Year::all(),
            'fuelTypes' => FuelType::all(),
            'fuelUnits' => FuelUnit::all(),
            'calculations' => Calculation::all()
        ]);
    }

    public function calculate(CalculateRequest $request)
    {
        $validated = $request->validated();
        $fuelType = FuelType::find($validated['fuel_type_id']);
        $fuelUnit = FuelUnit::find($validated['unit_id']);

        return response()->json([
            'data' => $this->calculateAmountOfGasesReleased($fuelType->factor_rate, $fuelUnit->factor_rate, $validated['amount_of_fuel'])
        ]);
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $fuelType = FuelType::find($validated['fuel_type_id']);
        $fuelUnit = FuelUnit::find($validated['unit_id']);
        $amountOfGasesReleased = $this->calculateAmountOfGasesReleased($fuelType->factor_rate, $fuelUnit->factor_rate, $validated['amount_of_fuel']);
        $calculation = Calculation::updateOrcreate(['id' => $validated['id']], array_merge($validated, $amountOfGasesReleased));

        return response()->json([
            'data' => $calculation
        ]);
    }

    public function edit(Calculation $calculation)
    {
        return response()->json([
            'data' => $calculation
        ]);
    }

    public function delete(Calculation $calculation)
    {
        $calculation->delete();

        return response()->json([
            'message' => "Kayıt silindi."
        ]);
    }


    private function calculateAmountOfGasesReleased(
        float $fuelTypeFactorRate,
        float $fuelUnitFactorRate,
        float $amountOfFuel): array
    {
        return [
            "co2" => $fuelTypeFactorRate * $fuelUnitFactorRate * $amountOfFuel * Calculation::CO2_RATE_FACTOR,
            "ch4" => $fuelTypeFactorRate * $fuelUnitFactorRate * $amountOfFuel * Calculation::CH4_RATE_FACTOR,
            "n2o" => $fuelTypeFactorRate * $fuelUnitFactorRate * $amountOfFuel * Calculation::N2O_RATE_FACTOR,
            "co2e" => $fuelTypeFactorRate * $fuelUnitFactorRate * $amountOfFuel * Calculation::CO2E_RATE_FACTOR,
        ];
    }

}
