@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Customer Details</div>

                <div class="card-body">
                    <h3>{{ $customer->name }}</h3>
                    <p>Address: {{ $customer->address }}</p>
                    <p>Phone Number: {{ $customer->phone_number }}</p>
                    <p>ID Card: {{ $customer->id_card }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection