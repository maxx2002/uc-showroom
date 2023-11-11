@extends('layouts.app')

@section('title', 'Create Customer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Customer</div>

                <div class="card-body">
                    <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
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