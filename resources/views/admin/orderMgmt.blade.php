@extends('layouts.custom')
@section('content')
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
<h1 class="alert alert-primary">Orders</h1>
<ul>
@foreach($orders as $order)
<li class="card">
<div class="card-body">    
    <div class="alert alert-secondary">
Order ID: {{ $order->id }} ---- Customer Name: {{ $order->customer_name }} ---- Address: {{$order->address}} ---- deli_status: {{ $order->deli_status ? "done" : "not yet delivered" }}    
</div>
<h3>Order Items</h3>
<ul>
    @foreach ($order->orderItems as $item)
        <li>
        Product: {{ optional($item->product)->product_name }}
            Quantity: {{ $item->quantity }}
        </li>
    @endforeach
</ul>

@if($order->deli_status == 0)
        <form action="{{ route('statusChange',['id'=> $order->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <button class="btn btn-warning" type="submit" name="deli_status" value=1>Mark as Delivered</button>
        </form>
    @elseif($order->deli_status == 1)
        <form action="{{ route('statusChange', ['id'=>$order->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <button class="btn btn-info" type="submit" name="deli_status" value=0>Undo</button>
        </form>
    @endif
</div>
</li>
<br>
@endforeach
</ul>

@endsection