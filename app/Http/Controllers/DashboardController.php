<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $categories = Category::count();
        $orders = Order::count();
        $customers = Customer::count();
        $messages = Message::count();

        return view('admin.dashboard', compact(
            'products',
            'categories',
            'orders',
            'customers',
            'messages',
        ));
    }
}