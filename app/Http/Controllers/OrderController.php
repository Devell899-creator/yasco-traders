<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::orderBy('id', 'asc')->paginate(5);

        return view('admin.orders.index', compact('orders'));
    }

    public function create(){
        return view('admin.orders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
        ]);

        Order::create($validated);

        return redirect()->route('admin.orders.index')->with('success', 'Order added successfully.');
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
       $validated = $request->validate([
          'customer_name' => 'required|string|max:255',
          'customer_email' => 'nullable|email|max:255',
          'customer_phone' => 'nullable|string|max:20',
          'address' => 'nullable|string',
          'total_amount' => 'required|numeric|min:0',
          'status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
        ]);

        $order->update($validated);

       return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
    
}
