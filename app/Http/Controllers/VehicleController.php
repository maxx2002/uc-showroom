<?php

namespace App\Http\Controllers;

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
        

        return redirect('vehicle');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        
        return view('vehicle.details');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        
        return view('vehicle.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        

        return redirect('vehicle');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        

        return redirect('vehicle');
    }
}
