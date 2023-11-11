<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
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
        $customers = Customer::all();

        return view('customer.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'id_card' => 'required|max:2096'
        ]);

        Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'id_card' => $request->file('id_card')->store('id_cards', 'public')
        ]);

        return redirect('customer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.details')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'id_card' => 'required|max:2096'
        ]);

        $id_card = $request->file('id_card');

        if ($id_card) {
            Storage::disk('public')->delete($request->old_id_card);

            $customer->update([
                'name' => $request->name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'id_card' => $id_card->store('id_cards', 'public')
            ]);
        } else {
            $customer->update([
                'name' => $request->name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
            ]);
        }

        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        Storage::disk('public')->delete('public', $customer->id_card);
        $customer->delete();

        return redirect('customer');
    }
}
