@extends('layouts.app')

@section('title', 'Order')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Order</div>

                <div class="card-body">
                    <div class="card-body">
                        <a href="{{ url('/order/create') }}" class="btn btn-success btn-sm">Add New</a>
                    </div>

                    <div class="table-responsive px-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->customers->name }}</td>
                                        <td>{{ $order->customers->address }}</td>
                                        <td>
                                            <a href="{{ url('order/' . $order->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ url('/order/' . $order->id . '/edit') }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ url('/order/' . $order->id) }}" method="POST">
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