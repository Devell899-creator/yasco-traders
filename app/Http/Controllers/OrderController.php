<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $order->load('items');

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

    // Cancelled order ko dobara activate nahi karna.
    if (
        $order->status === 'Cancelled' &&
        $validated['status'] !== 'Cancelled'
    ) {
        return back()
            ->withInput()
            ->with('error', 'Cancelled order ko reactivate nahi kar sakte.');
    }

    DB::transaction(function () use ($order, $validated) {

        $lockedOrder = Order::whereKey($order->id)
            ->lockForUpdate()
            ->firstOrFail();

        // Stock sirf pehli cancellation par restore hoga.
        if (
            $validated['status'] === 'Cancelled' &&
            $lockedOrder->status !== 'Cancelled' &&
            $lockedOrder->stock_restored_at === null
        ) {
            $items = $lockedOrder->items()->get();

            foreach ($items as $item) {
                $product = Product::whereKey($item->product_id)
                    ->lockForUpdate()
                    ->first();

                if ($product) {
                    $product->increment(
                        'stock',
                        (int) $item->quantity
                    );
                }
            }

            $lockedOrder->stock_restored_at = now();
        }

        $lockedOrder->fill($validated);
        $lockedOrder->save();
    });

    return redirect()
        ->route('admin.orders.index')
        ->with('success', 'Order updated successfully.');
}


    public function destroy(Order $order)
{
    return redirect()
        ->route('admin.orders.index')
        ->with(
            'error',
            'Orders ko permanently delete karna disabled hai taake order history محفوظ rahe.'
        );
}
    
}
