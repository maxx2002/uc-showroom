@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Customer</div>

                <div class="card-body">
                    <form action="{{ route('customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="old_id_card" value="{{ $customer->id_card }}">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $customer->name }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $customer->address }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" value="{{ $customer->phone_number }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ID Card</label>
                            <input type="file" class="form-control" name="id_card" id="id_card">
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