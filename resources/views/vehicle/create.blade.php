@extends('layouts.app')

@section('title', 'Create Vehicle')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Vehicle</div>

                <div class="card-body">
                    <form action="{{ route('vehicle.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Model</label>
                            <input type="text" class="form-control" name="model" value="{{ old('model') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Year</label>
                            <input type="number" class="form-control" name="year" value="{{ old('year') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Passenger</label>
                            <input type="number" class="form-control" name="total_passenger" value="{{ old('total_passenger') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Manufacture</label>
                            <input type="text" class="form-control" name="manufacture" value="{{ old('year') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-control" id="type" onchange="showCarInput()">
                                <option value="App\Models\Car" selected>Car</option>
                                <option value="App\Models\Motorcycle">Motorcycle</option>
                                <option value="App\Models\Truck">Truck</option>
                            </select>
                        </div>
                        <div id="carInput" style="display: block">
                            <div class="mb-3">
                                <label class="form-label">Fuel Type</label>
                                <input type="text" class="form-control" name="fuel_type">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Trunk Area</label>
                                <input type="number" class="form-control" name="trunk_area">
                            </div>
                        </div>
                        <div id="motorcycleInput" style="display: none">
                            <div class="mb-3">
                                <label class="form-label">Trunk Size</label>
                                <input type="number" class="form-control" name="trunk_size">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fuel Capacity</label>
                                <input type="number" class="form-control" name="fuel_capacity">
                            </div>
                        </div>
                        <div id="truckInput" style="display: none">
                            <div class="mb-3">
                                <label class="form-label">Wheel</label>
                                <input type="number" class="form-control" name="wheel">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cargo Area</label>
                                <input type="number" class="form-control" name="cargo_area">
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