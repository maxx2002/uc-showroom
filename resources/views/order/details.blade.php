@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Order Details</div>

                <div class="card-body">
                    <h3>Order ID: {{ $order->id }}</h3>
                    <h6>Total Price: Rp{{ $total_price }}</h6>
                    <h5>Customer Name: {{ $order->customers->name }}</h5>
                    <p>Customer Address: {{ $order->customers->address }}</p>
                    <p>Customer Phone Number: {{ $order->customers->phone_number }}</p>
                    <h5>Vehicle:</h5>
                    @foreach ($order->order_vehicle as $vehicle)
                        <p>{{ $vehicle->amount }} - 
                            {{ $vehicle->vehicles->model }} - 
                            {{ $vehicle->vehicles->manufacture }} -
                            {{ $vehicle->vehicles->year }} -
                            {{ $vehicle->vehicles->total_passenger }} Passengers -
                            {{ $vehicle->vehicles->vehicleable_type == "App\Models\Car" ? "Car" : ($vehicle->vehicles->vehicleable_type == "App\Models\Motorcycle" ? "Motorcycle" : "Truck") }} - 
                            @if ($vehicle->vehicles->vehicleable_type == "App\Models\Car")
                                {{ $vehicle->vehicles->vehicleable->fuel_type }} -
                                {{ $vehicle->vehicles->vehicleable->trunk_area }} Trunk Area -
                            @elseif ($vehicle->vehicles->vehicleable_type == "App\Models\Motorcycle")
                                {{ $vehicle->vehicles->vehicleable->trunk_size }} Trunk Size -
                                {{ $vehicle->vehicles->vehicleable->fuel_capacity }} Fuel Capacity -
                            @else 
                                {{ $vehicle->vehicles->vehicleable->wheel }} Wheel -
                                {{ $vehicle->vehicles->vehicleable->cargo_area }} Cargo Area -
                            @endif
                            Rp{{ $vehicle->vehicles->price }} Each
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection