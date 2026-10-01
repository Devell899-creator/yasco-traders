<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::orderBy('id', 'asc')->paginate(5);

        return view('admin.customers.index', compact('customers'));
    }

    public function create(){
        return view('admin.customers.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'status' => 'required|boolean',
        ]);  
        
        Customer::create($validated);

        return redirect()->route('admin.customers.index')->with('success', 'Customer added successfully.');
    }

    public function show(Customer $customer){
        return view('admin.customers.show', compact('customer'));
    }

    public function update(Request $request, Customer $customer){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $customer->update($validated);

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    public function edit(Customer $customer){
        return view('admin.customers.edit', compact('customer'));
    }

    public function destroy(Customer $customer){
        $customer->delete();

        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }
}
