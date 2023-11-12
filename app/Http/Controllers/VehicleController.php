<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\Truck;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();

        return view('vehicle.index')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'year' => 'required|numeric',
            'total_passenger' => 'required|numeric',
            'manufacture' => 'required',
            'price' => 'required|numeric'
        ]);

        if ($request->type == "App\Models\Car") {
            $request->validate([
                'fuel_type' => 'required',
                'trunk_area' => 'required|numeric'
            ]);
        } else if ($request->type == "App\Models\Motorcycle") {
            $request->validate([
                'trunk_size' => 'required|numeric',
                'fuel_capacity' => 'required|numeric'
            ]);
        } else {
            $request->validate([
                'wheel' => 'required|numeric',
                'cargo_area' => 'required|numeric'
            ]);
        }

        if ($request->type == "App\Models\Car") {
            $car = Car::query()->create([
                'fuel_type' => $request->fuel_type,
                'trunk_area' => $request->trunk_area
            ]);

            $car->vehicle()->create([
                'model' => $request->model,
                'year' => $request->year,
                'total_passenger' => $request->total_passenger,
                'manufacture' => $request->manufacture,
                'price' => $request->price
            ]);
        } else if ($request->type == "App\Models\Motorcycle") {
            $motorcycle = Motorcycle::query()->create([
                'trunk_size' => $request->trunk_size,
                'fuel_capacity' => $request->fuel_capacity
            ]);

            $motorcycle->vehicle()->create([
                'model' => $request->model,
                'year' => $request->year,
                'total_passenger' => $request->total_passenger,
                'manufacture' => $request->manufacture,
                'price' => $request->price
            ]);
        } else {
            $truck = Truck::query()->create([
                'wheel' => $request->wheel,
                'cargo_area' => $request->cargo_area
            ]);

            $truck->vehicle()->create([
                'model' => $request->model,
                'year' => $request->year,
                'total_passenger' => $request->total_passenger,
                'manufacture' => $request->manufacture,
                'price' => $request->price
            ]);
        }

        return redirect('vehicle');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        
        return view('vehicle.details')->with('vehicle', $vehicle);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        // dd($vehicle->vehicleable_type);
        
        return view('vehicle.edit')->with('vehicle', $vehicle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $request->validate([
            'model' => 'required',
            'year' => 'required|numeric',
            'total_passenger' => 'required|numeric',
            'manufacture' => 'required',
            'price' => 'required|numeric'
        ]);

        if ($request->type == "App\Models\Car") {
            $request->validate([
                'fuel_type' => 'required',
                'trunk_area' => 'required|numeric'
            ]);
        } else if ($request->type == "App\Models\Motorcycle") {
            $request->validate([
                'trunk_size' => 'required|numeric',
                'fuel_capacity' => 'required|numeric'
            ]);
        } else {
            $request->validate([
                'wheel' => 'required|numeric',
                'cargo_area' => 'required|numeric'
            ]);
        }

        $vehicle->update([
            'model' => $request->model,
            'year' => $request->year,
            'total_passenger' => $request->total_passenger,
            'manufacture' => $request->manufacture,
            'price' => $request->price
        ]);

        if($vehicle->vehicleable_type == $request->type) {
            if ($request->type == "App\Models\Car") {
                $vehicle->vehicleable->update([
                    'fuel_type' => $request->fuel_type,
                    'trunk_area' => $request->trunk_area
                ]);
            } else if ($request->type == "App\Models\Motorcycle") {
                $vehicle->vehicleable->update([
                    'trunk_size' => $request->trunk_size,
                    'fuel_capacity' => $request->fuel_capacity
                ]);
            } else {
                $vehicle->vehicleable->update([
                    'wheel' => $request->wheel,
                    'cargo_area' => $request->cargo_area
                ]);
            }
        } else {
            if ($request->type == "App\Models\Car") {
                $car = Car::query()->create([
                    'fuel_type' => $request->fuel_type,
                    'trunk_area' => $request->trunk_area
                ]);
    
                $vehicle->update([
                    'vehicleable_type' => "App\Models\Car",
                    'vehicleable_id' => $car->id
                ]);
            } else if ($request->type == "App\Models\Motorcycle") {
                $motorcycle = Motorcycle::query()->create([
                    'trunk_size' => $request->trunk_size,
                    'fuel_capacity' => $request->fuel_capacity
                ]);
    
                $vehicle->update([
                    'vehicleable_type' => "App\Models\Motorcycle",
                    'vehicleable_id' => $motorcycle->id
                ]);
            } else {
                $truck = Truck::query()->create([
                    'wheel' => $request->wheel,
                    'cargo_area' => $request->cargo_area
                ]);
    
                $vehicle->update([
                    'vehicleable_type' => "App\Models\Truck",
                    'vehicleable_id' => $truck->id
                ]);
            }
        }
        
        return redirect('vehicle');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect('vehicle');
    }
}
