@extends('layouts.app')

@section('title', 'Edit Vehicle')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Vehicle</div>

                <div class="card-body">
                    <form action="{{ route('vehicle.update', $vehicle->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="mb-3">
                            <label class="form-label">Model</label>
                            <input type="text" class="form-control" name="model" value="{{ $vehicle->model }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Year</label>
                            <input type="number" class="form-control" name="year" value="{{ $vehicle->year }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Passenger</label>
                            <input type="number" class="form-control" name="total_passenger" value="{{ $vehicle->total_passenger }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Manufacture</label>
                            <input type="text" class="form-control" name="manufacture" value="{{ $vehicle->manufacture }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" value="{{ $vehicle->price }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-control" id="type" onchange="showCarInput()">
                                @if ($vehicle->vehicleable_type == "App\Models\Car")
                                    <option value="App\Models\Car" selected>Car</option>
                                    <option value="App\Models\Motorcycle">Motorcycle</option>
                                    <option value="App\Models\Truck">Truck</option>
                                @elseif ($vehicle->vehicleable_type == "App\Models\Motorcycle")
                                    <option value="App\Models\Car">Car</option>
                                    <option value="App\Models\Motorcycle" selected>Motorcycle</option>
                                    <option value="App\Models\Truck">Truck</option>
                                @else
                                    <option value="App\Models\Car">Car</option>
                                    <option value="App\Models\Motorcycle">Motorcycle</option>
                                    <option value="App\Models\Truck" selected>Truck</option>
                                @endif
                                
                            </select>
                        </div>
                        <div id="carInput" style="display: block">
                            <div class="mb-3">
                                <label class="form-label">Fuel Type</label>
                                <input type="text" class="form-control" name="fuel_type" value="{{ $vehicle->vehicleable->fuel_type }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Trunk Area</label>
                                <input type="number" class="form-control" name="trunk_area" value="{{ $vehicle->vehicleable->trunk_area }}">
                            </div>
                        </div>
                        <div id="motorcycleInput" style="display: none">
                            <div class="mb-3">
                                <label class="form-label">Trunk Size</label>
                                <input type="number" class="form-control" name="trunk_size" value="{{ $vehicle->vehicleable->trunk_size }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fuel Capacity</label>
                                <input type="number" class="form-control" name="fuel_capacity" value="{{ $vehicle->vehicleable->fuel_capacity }}">
                            </div>
                        </div>
                        <div id="truckInput" style="display: none">
                            <div class="mb-3">
                                <label class="form-label">Wheel</label>
                                <input type="number" class="form-control" name="wheel" value="{{ $vehicle->vehicleable->wheel }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cargo Area</label>
                                <input type="number" class="form-control" name="cargo_area" value="{{ $vehicle->vehicleable->cargo_area }}">
                            </div>
                        </div>
                        
                        <input type="submit" value="Save" class="btn btn-outline-dark">
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        showCarInput();
    };

    function showCarInput() {
        var value = document.getElementById("type").value;
        console.log(value);

        if (value == "App\\Models\\Car") {
            var car = document.getElementById("carInput");
            var motorcycle = document.getElementById("motorcycleInput");
            var truck = document.getElementById("truckInput");

            car.style.display = "block";
            motorcycle.style.display = "none";
            truck.style.display = "none";
        } else if (value == "App\\Models\\Motorcycle") {
            var car = document.getElementById("carInput");
            var motorcycle = document.getElementById("motorcycleInput");
            var truck = document.getElementById("truckInput");

            car.style.display = "none";
            motorcycle.style.display = "block";
            truck.style.display = "none";
        } else {
            var car = document.getElementById("carInput");
            var motorcycle = document.getElementById("motorcycleInput");
            var truck = document.getElementById("truckInput");

            car.style.display = "none";
            motorcycle.style.display = "none";
            truck.style.display = "block";
        }
    }
</script>
@endsection