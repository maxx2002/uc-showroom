@extends('layouts.app')

@section('title', 'Create Order')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Order</div>

                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Customer</label>
                                <select name="customer_id" id="" class="form-control">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }} - {{ $customer->phone_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="vehicle_container">
                                <div class="mb-3">
                                    <label class="form-label">Vehicle</label>
                                    <select name="vehicle_id[]" id="" class="form-control">
                                        @foreach ($vehicles as $vehicle)
                                            <option value="{{ $vehicle->id }}">{{ $vehicle->model }} - {{ $vehicle->year }} - Rp{{ $vehicle->price }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Amount</label>
                                    <input type="number" class="form-control" name="amount[]">
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary mb-3" onclick="add_field();">Add Vehicle</button></br>

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
</div>

<script>
    var fieldId = 0;
 
    function add_element(parent_id, element_tag, element_id, html){
        var id = document.getElementById(parent_id);
        var newElement = document.createElement(element_tag);
        newElement.setAttribute('id', element_id);
        newElement.innerHTML = html;
        id.appendChild(newElement);
    }
  
    function remove_field(element_id){
        var fieldId = "field-"+element_id;
        var element = document.getElementById(fieldId);
        element.parentNode.removeChild(element);
    }
    
    function add_field(){
        fieldId++;
        var html = '<div class="mb-3">' +
            '<label class="form-label">Vehicle</label>' + 
            '<select name="vehicle_id[]" id="" class="form-control">' +
            '@foreach ($vehicles as $vehicle)' +
                '<option value="{{ $vehicle->id }}">{{ $vehicle->model }} - {{ $vehicle->year }} - Rp{{ $vehicle->price }}</option>' +
            '@endforeach' +
            '</select>' +
            '</div>' +
            '<div class="mb-3">' +
            '<label class="form-label">Amount</label>' +
            '<input type="number" class="form-control" name="amount[]">' +
            '<button onclick="remove_field('+fieldId+');"><span class="glyphicon glyphicon-minus"></span></button><br />' +
            '</div>'
            ;
        add_element('vehicle_container', 'div', 'field-'+ fieldId, html);
    }
</script>
@endsection