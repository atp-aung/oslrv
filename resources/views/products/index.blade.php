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

<a
href="{{ url("/products-in-cart") }}">
({{$totalItems}}) items in Cart &raquo;
</a>
<br>
<a
href="{{ url("/products-in-cart/clear") }}">
&times; Clear Cart 
</a>
<h1 class="alert alert-primary">Product List</h1>
<ul>
@foreach($products as $product)
<li class="card"> 
    <div class="card-body">
product: {{ $product['product_name'] }} ---- price: {{ $product['price'] }}
<br>
<a
href="{{ url("/products-in-cart/add/$product->id")}}">
Add to Cart &raquo;
</a>
</div>
</li>
<br>
@endforeach
</ul>
@endsection

<!-- </body>
</html> -->