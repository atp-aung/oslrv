@extends('layouts.custom')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><strong>Dashboard</strong></div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @else
                <div class="alert alert-success">
                    Hello, Admin, You are logged in!
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<a
href="{{route('products.add')}}">
+Add Product
</a>
<br>
<a
href="{{route('dashboardSub')}}">
Product Management
</a>
<br>
<a
href="{{route('orderMgmtView')}}">
Order Management
</a>
<br>
<h1 class="alert alert-primary">Product List</h1>
<ul >
@foreach($products as $product)
<li class="card">
    <div class="card-body">product: {{ $product['product_name'] }} ---- price: {{ $product['price'] }}
    <br>

    <a class="btn btn-warning"
href="{{route('products.edit', ['id' => $product->id])}}">
Edit
</a>

<a class="btn btn-danger"
href="{{route('products.delete', ['id' => $product->id])}}">
Delete
</a>

</div>
</li>
<br>
@endforeach
</ul>
@endsection