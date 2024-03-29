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
<h1>Product edit form</h1>

<div class="container">
    <form method="post">
        @csrf
        <div class="mb-3">
            <label>Product name</label>
            <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" value="{{$product->price}}" class="form-control">
        </div>
        <input type="submit" value="Update" class="btn btn-primary">
    </form>
</div>
@endsection