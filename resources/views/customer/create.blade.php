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
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ID Card</label>
                            <input type="file" class="form-control" name="id_card" id="id_card">
                        </div>
                        <input type="submit" value="Save" class="btn btn-outline-dark">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection