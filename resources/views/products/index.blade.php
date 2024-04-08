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

<style>
    .custom-bg-atp {
        background-color: #bc986a;
        /* Replace #f0f0f0 with your desired color */
    }

    .custom-btn-atp {
        background-color: #83c9ea;
        /* Replace #f0f0f0 with your desired color */
    }

    .custom-hd-atp {
        background-color: #8d8741;
        /* Replace #f0f0f0 with your desired color */
    }
</style>

<div class="alert custom-hd-atp">

    <a class="btn custom-btn-atp" href="{{ url("/products-in-cart") }}">
        ({{$totalItems}}) items in Cart &raquo;
    </a>
    <a class="btn custom-btn-atp" href="{{ url("/products-in-cart/clear") }}">
        &times; Clear Cart
    </a>
</div>

<div class="card custom-hd-atp">

    <h1 class="alert alert-primary">Product List</h1>

    <ul>
        @foreach($products as $product)
        <li class=" card">
            <div class="card-body custom-bg-atp">
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