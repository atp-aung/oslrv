<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return redirect('/');
        }       

        // Get the current cart from the session
        $cart = session('cart', []);

        // Check if the product is already in the cart
        if (array_key_exists($productId, $cart)) {
            // If yes, update the quantity
            $cart[$productId] ++;
        } else {
            // If not, add the product to the cart
            $cart[$productId] = 1;
        }

        // Store the updated cart back in the session
        session(['cart' => $cart]);

        return redirect('/')->with('add', 'Product added to cart');
    }

    public function clearCart()
    {
        Session::forget('cart');
        return redirect('/')->with('clear', 'Cart is cleared');   
    }

    public function viewCart()
    {
        $cartItems = session('cart', []);

        $cartDetails = [];
        $totalAmount = 0;

        foreach ($cartItems as $productId => $qty) {
            $product = Product::find($productId);

            if ($product) {
                $subtotal = $product->price * $qty;
                $totalAmount += $subtotal;

                $cartDetails[] = [
                    'productName' => $product->product_name,
                    'unitPrice' => $product->price,
                    'quantity' => $qty,                    
                    'subtotal' => $subtotal,
                    'totalAmount'=>$totalAmount,
                ];
            }
        }

        return view('cart.viewCart', compact('cartDetails'));
    }
}
