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
    public function home()
    {
        $products = Product::latest()->take(10)->get();

        $qualityText = WebsiteContent::where('page', 'home')
            ->where('section', 'products')
            ->where('key', 'quality_text')
            ->value('value');

        return view('frontend.home', compact('products', 'qualityText'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function shop()
    {
        return view('frontend.shop');
    }

    public function products()
    {
        $products = Product::with('category')->latest()->get();

        return view('frontend.products', compact('products'));
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function cart()
    {
        $cart = session()->get('cart', []);

        return view('frontend.cart', compact('cart'));
    }

    public function productDetail(Product $product)
    {
        $product->load('category');

        return view('frontend.product-detail', compact('product'));
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::to('bilalmurtaza941@gmail.com')
            ->send(new ContactMessageMail($validated));

        return redirect()
            ->route('frontend.contact')
            ->with('success', 'Your message has been sent successfully.');
    }

    public function loginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role !== 'customer') {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Please use the admin login page.',
                ])->onlyInput('email');
            }

            return redirect()->route('frontend.home');
        }

        return back()->withErrors([
            'email' => 'The email or password is incorrect.',
        ])->onlyInput('email');
    }

    /*
    |--------------------------------------------------------------------------
    | Add to Cart
    |--------------------------------------------------------------------------
    */

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ((int) $product->stock <= 0) {
            return back()->with('error', 'This product is out of stock.');
        }

        $cart = session()->get('cart', []);
        $productId = $product->id;

        $currentQuantity = $cart[$productId]['quantity'] ?? 0;

        if ($currentQuantity >= $product->stock) {
            return back()->with(
                'error',
                'You cannot add more than the available stock.'
            );
        }

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('frontend.cart')
            ->with('success', 'Product added to cart successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Update Cart Quantity - AJAX Supported
    |--------------------------------------------------------------------------
    */

    public function updateCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:0',
        ]);

        $cart = session()->get('cart', []);
        $productId = $validated['product_id'];
        $quantity = (int) $validated['quantity'];

        if (!isset($cart[$productId])) {
            return $this->cartError(
                $request,
                'This product is not in your cart.',
                404
            );
        }

        if ($quantity === 0) {
            unset($cart[$productId]);

            session()->put('cart', $cart);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'removed' => true,
                    'productId' => (int) $productId,
                    'total' => $this->cartTotal($cart),
                    'cartCount' => $this->cartCount($cart),
                    'empty' => empty($cart),
                    'message' => 'Product removed from cart.',
                ]);
            }

            return redirect()->route('frontend.cart');
        }

        $product = Product::find($productId);

        if (!$product || (int) $product->stock <= 0) {
            return $this->cartError(
                $request,
                'This product is out of stock.',
                422
            );
        }

        if ($quantity > $product->stock) {
            return $this->cartError(
                $request,
                'Only ' . $product->stock . ' item(s) are available.',
                422
            );
        }

        $cart[$productId]['quantity'] = $quantity;

        session()->put('cart', $cart);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'removed' => false,
                'productId' => (int) $productId,
                'quantity' => $quantity,
                'itemSubtotal' => round(
                    (float) $cart[$productId]['price'] * $quantity,
                    2
                ),
                'total' => $this->cartTotal($cart),
                'cartCount' => $this->cartCount($cart),
                'empty' => empty($cart),
                'message' => 'Cart updated successfully.',
            ]);
        }

        return redirect()->route('frontend.cart');
    }

    /*
    |--------------------------------------------------------------------------
    | Remove From Cart - AJAX Supported
    |--------------------------------------------------------------------------
    */

    public function removeFromCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
        ]);

        $cart = session()->get('cart', []);
        $productId = $request->product_id;

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'removed' => true,
                'productId' => (int) $productId,
                'total' => $this->cartTotal($cart),
                'cartCount' => $this->cartCount($cart),
                'empty' => empty($cart),
                'message' => 'Product removed from cart.',
            ]);
        }

        return redirect()->route('frontend.cart');
    }

    /*
    |--------------------------------------------------------------------------
    | Cart Helpers
    |--------------------------------------------------------------------------
    */

    private function cartTotal(array $cart): float
    {
        return round(
            collect($cart)->sum(function ($item) {
                return (float) $item['price'] * (int) $item['quantity'];
            }),
            2
        );
    }

    private function cartCount(array $cart): int
    {
        return (int) collect($cart)->sum(function ($item) {
            return (int) $item['quantity'];
        });
    }

    private function cartError(
        Request $request,
        string $message,
        int $status = 422
    ) {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $message,
            ], $status);
        }

        return back()->with('error', $message);
    }

    /*
    |--------------------------------------------------------------------------
    | Checkout
    |--------------------------------------------------------------------------
    */

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('frontend.cart');
        }

        // Checkout par current stock bhi verify karein.
        foreach ($cart as $item) {
            $product = Product::find($item['id']);

            if (
                !$product ||
                (int) $product->stock < (int) $item['quantity']
            ) {
                return redirect()->route('frontend.cart')
                    ->with(
                        'error',
                        'A product in your cart is no longer available in the requested quantity.'
                    );
            }
        }

        $total = $this->cartTotal($cart);

        return view('frontend.checkout', compact('cart', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'password' => Auth::check()
                ? 'nullable'
                : 'required|string|min:8|confirmed',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'payment_method' => 'required|in:cod',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('frontend.cart');
        }

        $total = $this->cartTotal($cart);

        $order = DB::transaction(function () use (
            $validated,
            $cart,
            $total
        ) {
            // Recheck stock while creating the order.
            foreach ($cart as $item) {
                $product = Product::whereKey($item['id'])
                    ->lockForUpdate()
                    ->first();

                if (
                    !$product ||
                    (int) $product->stock < (int) $item['quantity']
                ) {
                    throw new \RuntimeException(
                        'A product is no longer available in the requested quantity.'
                    );
                }
            }

            $order = Order::create([
                'customer_name' => $validated['name'],
                'customer_email' => $validated['email'],
                'customer_phone' => $validated['phone'],
                'address' => $validated['address']
                    . "\nCity: " . $validated['city'],
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

        /*
        |--------------------------------------------------------------------------
        | Guest Customer Account
        |--------------------------------------------------------------------------
        */

        if (!Auth::check()) {
            $user = \App\Models\User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'password' => $validated['password'],
                'role' => 'customer',
            ]);

            Auth::login($user);

            $request->session()->regenerate();
        }

        session()->forget('cart');

        return redirect()->route('frontend.order.success', $order->id);
    }

    public function orderSuccess(Order $order)
    {
        $order->load('items');

        return view('frontend.order-success', compact('order'));
    }
}