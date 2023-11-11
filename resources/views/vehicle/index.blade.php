@extends('layouts.app')

@section('title', 'Vehicle')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Vehicle</div>

                <div class="card-body">
                    <div class="card-body">
                        <a href="{{ url('/vehicle/create') }}" class="btn btn-success btn-sm">Add New</a>
                    </div>

                    <div class="table-responsive px-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Vehicle Type</th>
                                    <th>Model</th>
                                    <th>Manufacture</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($vehicle->vehicleable_type == "App\Models\Car")
                                                Car
                                            @elseif ($vehicle->vehicleable_type == "App\Models\Motorcycle")
                                                Motorcycle
                                            @else
                                                Truck
                                            @endif
                                        </td>
                                        <td>{{ $vehicle->model }}</td>
                                        <td>{{ $vehicle->manufacture }}</td>
                                        <td>{{ $vehicle->price }}</td>
                                        <td>
                                            <a href="{{ url('vehicle/' . $vehicle->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ url('/vehicle/' . $vehicle->id . '/edit') }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ url('/vehicle/' . $vehicle->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection