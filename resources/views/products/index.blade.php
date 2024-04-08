<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Product List</title>
</head>
<body> -->

@extends('layouts.custom')
@section('content')

<!-- @if(session('add'))
<div >
{{ session('add') }}
</div>
@endif

@if(session('clear'))
<div >
{{ session('clear') }}
</div>
@endif -->

<div class="alert alert-secondary">

    <a class="btn btn-secondary" href="{{ url("/products-in-cart") }}">
        ({{$totalItems}}) items in Cart &raquo;
    </a>
    <a class="btn btn-secondary" href="{{ url("/products-in-cart/clear") }}">
        &times; Clear Cart
    </a>
</div>

<div class="card">

    <h1 class="alert alert-primary">Product List</h1>
    <ul>
        @foreach($products as $product)
        <li class="card">
            <div class="card-body">
                <div class="alert alert-secondary">
                    product: {{ $product['product_name'] }}
                    <br>
                    price: {{ $product['price'] }}
                </div>
                <a class="btn btn-primary" href="{{ url("/products-in-cart/add/$product->id")}}">
                    Add to Cart &raquo;
                </a>
            </div>
        </li>
        <br>
        @endforeach
    </ul>
</div>
@endsection

<!-- </body>
</html> -->