<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
{
    $cart = session('cart', []);
    $products = Product::all();
    $totalQuantity = array_sum($cart);
return view('products.index', [
'products' => $products,
'totalItems'=>$totalQuantity
]);
}
}
