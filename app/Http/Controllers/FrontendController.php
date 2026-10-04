<?php

namespace App\Http\Controllers;

use App\Models\WebsiteContent;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function home(){
        $products = Product::latest()->take(10)->get();

        $qualityText = WebsiteContent::where('page', 'home')
        ->where('section', 'products')->where('key', 'quality_text')->value('value');

        return view('frontend.home', compact('products', 'qualityText'));
    }

    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function shop(){
        return view('frontend.shop');
    }

    public function products(){
        $products = Product::with('category')->latest()->get();

        return view('frontend.products', compact('products'));
    }

    public function login(){
        return view('frontend.login');
    }

    public function cart(){
       $cart = session()->get('cart', []);

       return view('frontend.cart', compact('cart'));
    }

    public function productDetail(Product $product){
       $product->load('category');

       return view('frontend.product-detail', compact('product'));
    }

    public function storeContact(Request $request){
        $validated = $request->validate([

           'name' => 'required|string|max:255',

           'email' => 'required|email|max:255',

           'phone' => 'nullable|string|max:20',

           'subject' => 'nullable|string|max:255',

           'message' => 'required|string',

        ]);


        Mail::to('bilalmurtaza941@gmail.com')->send(new ContactMessageMail($validated));


        return redirect()->route('frontend.contact')->with('success', 'Your message has been sent successfully.');
    }

    public function loginSubmit(Request $request){
       $credentials = $request->validate([
          'email' => 'required|email',
          'password' => 'required',
        ]);

       if (Auth::attempt($credentials)) {
          $request->session()->regenerate();

          return redirect('/admin');
        }

       return back()->withErrors([
          'email' => 'The email or password is incorrect.',
        ])->onlyInput('email');
    }

    public function addToCart(Request $request){
        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {

           $cart[$product->id]['quantity']++;

        } else {

              $cart[$product->id] = [
                  'id'       => $product->id,
                  'name'     => $product->name,
                  'price'    => $product->price,
                  'image'    => $product->image,
                  'quantity' => 1,
                ];
            }

            session()->put('cart', $cart);

            return redirect()->route('frontend.cart');
        } 

        public function updateCart(Request $request){
            $cart = session()->get('cart', []);

            $productId = $request->product_id;
            $quantity = $request->quantity;

            if (isset($cart[$productId])) {

               if ($quantity < 1) {
               unset($cart[$productId]);
            } else {
               $cart[$productId]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('frontend.cart');
    }

    public function removeFromCart(Request $request){
        $cart = session()->get('cart', []);

        $productId = $request->product_id;

        if (isset($cart[$productId])) {
           unset($cart[$productId]);
        }

        session()->put('cart', $cart);

        return redirect()->route('frontend.cart');
    }

    public function checkout(){
        $cart = session()->get('cart', []);

        if (empty($cart)) {
           return redirect()->route('frontend.cart');
        }

        $total = collect($cart)->sum(function ($item) {
           return $item['price'] * $item['quantity'];
        });

        return view('frontend.checkout', compact('cart', 'total'));
    }

public function placeOrder(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:30',
        'address' => 'required|string',
        'city' => 'required|string|max:255',
        'payment_method' => 'required|in:cod',
    ]);

    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()->route('frontend.cart');
    }

    $total = collect($cart)->sum(function ($item) {
        return $item['price'] * $item['quantity'];
    });

    $order = DB::transaction(function () use ($validated, $cart, $total) {

        $order = Order::create([
            'customer_name' => $validated['name'],
            'customer_email' => $validated['email'],
            'customer_phone' => $validated['phone'],
            'address' => $validated['address'] . "\nCity: " . $validated['city'],
            'total_amount' => $total,
            'status' => 'Pending',
        ]);

        foreach ($cart as $item) {

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }

        return $order;
    });

    session()->forget('cart');

    return redirect()->route('frontend.order.success', $order->id);
}

    public function orderSuccess(Order $order){
       $order->load('items');

       return view('frontend.order-success', compact('order'));
    }
}
