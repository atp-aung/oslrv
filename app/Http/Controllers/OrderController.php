<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function createOrder(Request $request)
{
    $order = Order::create([
        'customer_name' => $request->input('customer_name'),
        'address' => $request->input('address'),
        // Add other order details here
    ]);

    // Retrieve cart items from the session
    $cartItems = session('cart', []);

    // Create order items and associate them with the order
    foreach ($cartItems as $productId => $qty) {
        $product = Product::find($productId);

        if ($product) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $qty,
            ]);
        }
    }

    // Clear the cart after the order is created
    Session::forget('cart');

    return view('orders.submitted', compact('order'));
}
}

