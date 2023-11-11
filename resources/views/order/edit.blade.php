@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Order</div>

                <div class="card-body">
                    <form action="{{ route('order.update', $order->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="mb-3">
                            <label class="form-label">Customer</label>
                            <select name="customer_id" id="" class="form-control">
                                @foreach ($customers as $customer)
                                    @if ($customer->id == $order->customer_id)
                                        <option value="{{ $customer->id }}" selected>{{ $customer->name }} - {{ $customer->phone_number }}</option>
                                    @else
                                        <option value="{{ $customer->id }}">{{ $customer->name }} - {{ $customer->phone_number }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div id="vehicle_container">
                            @foreach ($order->order_vehicle as $order_vehicle)
                                <div class="mb-3">
                                    <label class="form-label">Vehicle</label>
                                    <select name="vehicle_id[]" id="" class="form-control">
                                        @foreach ($vehicles as $vehicle)
                                            @if ($vehicle->id == $order_vehicle->vehicle_id)
                                                <option value="{{ $vehicle->id }}" selected>{{ $vehicle->model }} - {{ $vehicle->year }} - Rp{{ $vehicle->price }}</option>
                                            @else
                                                <option value="{{ $vehicle->id }}">{{ $vehicle->model }} - {{ $vehicle->year }} - Rp{{ $vehicle->price }}</option>
                                            @endif  
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Amount</label>
                                    <input type="number" class="form-control" name="amount[]" value="{{ $order_vehicle->amount }}">
                                </div>
                            @endforeach
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
@endsection