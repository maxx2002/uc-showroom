<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderVehicle;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $vehicles = Vehicle::all();

        return view('order.create', compact('customers', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::query()->create([
            'customer_id' => $request->customer_id
        ]);

        foreach($request->vehicle_id as $key=>$value) {
            OrderVehicle::create([
                'order_id' => $order->id,
                'vehicle_id' => $value,
                'amount' => $request->amount[$key]
            ]);
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);

        $total_price = 0;
        foreach ($order->order_vehicle as $vehicle) {
            $total_price += $vehicle->vehicles->price * $vehicle->amount;
        }
        
        return view('order.details', compact('order', 'total_price'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
        
        return view('order.edit')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        
        return redirect('/');
    }
}
