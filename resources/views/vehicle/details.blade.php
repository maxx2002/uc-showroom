@extends('layouts.app')

@section('title', 'Vehicle Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Vehicle Details</div>

                <div class="card-body">
                    <h3>{{ $vehicle->model }}</h3>
                    <p>Manufacture: {{ $vehicle->manufacture }}</p>
                    <p>Year: {{ $vehicle->year }}</p>
                    <p>Price: Rp{{ $vehicle->price }}</p>
                    <p>Total Passenger: {{ $vehicle->total_passenger }}</p>
                    @if ($vehicle->vehicleable_type == "App\Models\Car")
                        <p>Type: Car</p>
                        <p>Fuel Type: {{ $vehicle->vehicleable->fuel_type }}</p>
                        <p>Trunk Area: {{ $vehicle->vehicleable->trunk_area }}</p>
                    @elseif ($vehicle->vehicleable_type == "App\Models\Motorcycle")
                        <p>Type: Motorcycle</p>
                        <p>Trunk Size: {{ $vehicle->vehicleable->trunk_size }}</p>
                        <p>Fuel Capacity: {{ $vehicle->vehicleable->fuel_capacity }}</p>
                    @else
                        <p>Type: Truck</p>
                        <p>Wheel: {{ $vehicle->vehicleable->wheel }}</p>
                        <p>Cargo Area: {{ $vehicle->vehicleable->cargo_area }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection